<?php

    const SEPARATOR ="|";
    const BOOKMARKSFILE = "data/bookmarks.txt";
    
    function bookmarkToCSVLine($bookmark){
        $CVSLine = "";
        $CVSLine .= $bookmark['Id'].SEPARATOR;
        $CVSLine .= $bookmark['Title'].SEPARATOR;
        $CVSLine .= $bookmark['Description'].SEPARATOR;
        $CVSLine .= $bookmark['Url'].SEPARATOR;
        $CVSLine .= $bookmark['Source'];
        return $CVSLine."\n";
    }

    function CSVToBookmark($line) {
        $fields = explode(SEPARATOR, $line);
        $bookmark = [];
        $bookmark['Id']             = $fields[0];
        $bookmark['Title']          = $fields[1];
        $bookmark['Description']    = $fields[2];
        $bookmark['Url']            = $fields[3];
        $bookmark['Source']         = str_replace("\n","",$fields[4]);
        $bookmark['Source']         = str_replace("\r","",$bookmark['Source']);
        return $bookmark;
    }

    function isOwner($source, $bookmark){
        if (isset($source) && isset($bookmark))
            return strcmp($source, $bookmark['Source']) === 0;
        return false;
    }

    function bookmarkCompare($ba, $bb) {
        $sourceCmp = strcmp($ba['Source'], $bb['Source']);
        if ($sourceCmp === 0)
            return strcmp($ba['Title'], $bb['Title']);
        return $sourceCmp;
    }
    
    function readBookmarks() {
        $bookmarksFileHandle = fopen(BOOKMARKSFILE,'r');
        $bookmarks = [];
        while (!flock($bookmarksFileHandle, LOCK_SH)) { usleep(1); }
        while (!feof($bookmarksFileHandle)){
            $line = fgets($bookmarksFileHandle);
            if ($line)
                $bookmarks[] = CSVToBookmark($line);
        }
        flock($bookmarksFileHandle, LOCK_UN);
        fclose($bookmarksFileHandle);
        usort($bookmarks,'bookmarkCompare');
        return $bookmarks;
    }

    function writeBookmarks($bookmarks) {
        $bookmarksFileHandle = fopen(BOOKMARKSFILE,'w');
        while (!flock($bookmarksFileHandle, LOCK_EX)) { usleep(1); }
        try
        {
            foreach($bookmarks as $bookmark){
                fwrite($bookmarksFileHandle, bookmarkToCSVLine($bookmark));
            }
            
        } 
        catch(Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        finally {
            fflush($bookmarksFileHandle);
            flock($bookmarksFileHandle, LOCK_UN);
            fclose($bookmarksFileHandle);
        }
    }

    function getMaxId($bookmarks) {
        $id = 0;
        if ($bookmarks) {           
            foreach($bookmarks as $bookmark){
                if ((int)$bookmark['Id'] > $id) $id = (int)$bookmark['Id'];
            }
        }
        return $id;
    }

    function addBookmark($bookmark) {
        if (isset($bookmark)) {
            $bookmarks = readBookmarks();
            $bookmark['Id'] = getMaxId($bookmarks) + 1;
            $bookmarks[] = $bookmark;
            writeBookmarks($bookmarks);
        }
    }

    function findBookmark($id) {
        if (isset($id)) {
            $bookmarks = readBookmarks();
            foreach($bookmarks as $bookmark){
                if ($bookmark['Id'] === $id)
                    return $bookmark;
            }
        }
        return null;
    }

    function replaceBookmark($newBookmark) {
        if (isset($newBookmark)) {
            $id = $newBookmark['Id'];
            $bookmarks = readBookmarks();
            $index = 0;
            $found = false;
            foreach($bookmarks as $bookmark){
                if ($bookmark['Id'] === $id) {
                    $found = true;
                    break;
                }
                $index++;
            }
            if ($found) {
                unset($bookmarks[$index]);
                $bookmarks[] = $newBookmark;
                writeBookmarks($bookmarks);
            }
        }
    }

    function deleteBookmark($id) {
        if (isset($id)) {
            $bookmarks = readBookmarks();
            $index = 0;
            $found = false;
            foreach($bookmarks as $bookmark){
                if ($bookmark['Id'] === $id) {
                    $found = true;
                    break;
                }
                $index++;
            }
            if ($found) {
                unset($bookmarks[$index]);
                writeBookmarks($bookmarks);
            }
        }
    }
?>