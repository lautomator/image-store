var imageStoreApp = {
    "targets": [],
    "currentTags": [],
    tagPrefill: function (targets, tags, key) {
        "use strict";
        var index = 0;

        // clear
        if (key === ' ' || key === '' || targets.inputTag.value === "") {
            targets.formSuggestions[0].innerHTML = "";
        }

        while (index < tags.length) {
            if (key.toLowerCase() === tags[index][0].toLowerCase()) {
                targets.formSuggestions[0].innerHTML += "<li>" + tags[index] + "</li>";
            }
            index += 1;
        }
    }
};
