var imageStoreApp = {
    "targets": {},
    "currentTags": [],
    tagPrefill: function (tags, uInput) {
        "use strict";
        // check if user input matches any possible tag.
        var index = 0;
        var results = [];
        function clear(t) {
            t.innerHTML = "&nbsp;";
        }

        // check for matches
        while (index < tags.length) {
            if (uInput.toLowerCase()[0] === tags[index][0].toLowerCase()) {
                // store in the results array
                results.push(tags[index]);
            }
            index += 1;
        }

        // render the results
        index = 0;
        if (results.length > 0) {
            // show
            imageStoreApp.targets.formSuggestionsPanel[0].style.display = "inline-block";
            // clear
            clear(imageStoreApp.targets.formSuggestions[0]);
            while (index < results.length) {
                imageStoreApp.targets.formSuggestions[0].innerHTML += "<li class='ist-tag-suggestion'>" + results[index] + "</li>";
                index += 1;
            }
            // listen for clicks
            imageStoreApp.clickListener(imageStoreApp.targets);
        }

        // clear
        if (uInput === '') {
            clear(imageStoreApp.targets.formSuggestions[0]);
            imageStoreApp.targets.formSuggestionsPanel[0].style.display = "none";
        }
    },
    inputListener: function (target) {
        "use strict";
        // listen for key events
        target.inputTag.addEventListener("keyup", function() {
            imageStoreApp.tagPrefill(imageStoreApp.currentTags, target.inputTag.value);
        });
    },
    clickListener: function (target) {
        "use strict";
        // listen for clicks to suggested tags
        var index = 0;
        while (index < target.tagSuggestion.length) {
            target.tagSuggestion[index].addEventListener("click", function(item) {
                // populate the form field with the clicked suggestion
                imageStoreApp.targets.inputTag.value = item.target.innerText;
            });
            index += 1;
        }
    },
    pageNoListener: function (target) {
        console.log(target);
        // listen for change in page number input
        target.addEventListener("click", function(item) {
            console.log(item);
        });
    }
};
