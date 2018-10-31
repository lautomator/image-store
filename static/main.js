var imageStoreApp = {
    "targets": [],
    "currentTags": [],
    tagPrefill: function (tags, uInput) {
        "use strict";
        // check if user input matches any possible tag.
        var index = 0;
        var results = [];

        // check for matches
        while (index < tags.length) {
            if (uInput.toLowerCase()[0] === tags[index][0].toLowerCase()) {
                results.push(tags[index]);
            }
            index += 1;
        }

        console.log(results);

        // render the results
        index = 0;
        if (results.length > 0) {
            while (index < results.length) {
                imageStoreApp.targets.formSuggestions[0].innerHTML += "<li>" + results[index] + "</li>";
                index += 1;
            }
        }

        // clear
        if (uInput === '') {
            imageStoreApp.targets.formSuggestions[0].innerHTML = "<ul>&nbsp;</ul>";
        }
    },
    inputListener: function (target) {
        "use strict";
        // listen for key events
        target.inputTag.addEventListener("keyup", function() {
            imageStoreApp.tagPrefill(imageStoreApp.currentTags, target.inputTag.value);
        });
    }
};
