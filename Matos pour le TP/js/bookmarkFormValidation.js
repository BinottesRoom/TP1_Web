// objet d'automatisation de la validation
let validationProvider;

$(document).ready(initUI);

function initUI() {
    initValidation('bookmarkForm');
    doNotAllowPipeCharacterInInput();
}

function doNotAllowPipeCharacterInInput() {
    $("input").bind({
        keydown: function(e) {
            if (e.shiftKey === true ) {
                if (e.which == 222) {
                    return false;
                }
                return true;
            }
        }
    });
}

function initValidation(formId) {
    validationProvider = new ValidationProvider(formId);
    validationProvider.addControl("Title", validate_Title);
    validationProvider.addControl("Description", validate_Description);
    validationProvider.addControl("Url", validate_Url);
}

function validate_Title(){
    let TBX_Title = document.getElementById("Title");

    if (TBX_Title.value === "")
        return "Titre manquant";

    return "";
}

function validate_Description(){
    let TBX_Description = document.getElementById("Description");

    if (TBX_Description.value === "")
        return "Description manquante";

    return "";
}

function validate_Url(){
    let TBX_Url = document.getElementById("Url");
    let urlRegex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

    if (TBX_Url.value === "")
        return "Adresse du site manquante";

    if (!urlRegex.test(TBX_Url.value))
        return "Adresse du site invalide";

    return "";
}
