var imageStoreApp = {
    "targets": {},
    "currentTags": [],
    "cartOrder": {},
    showAllTags: function (allTags) {
        // this is in lieu of entering
        // a tag for a suggestion
        "use strict";
        var index = 0;

        // render the tags
        if (allTags.length > 0) {
            imageStoreApp.targets.formSuggestions[0].innerHTML = "";
            while (index < allTags.length) {
                imageStoreApp.targets.formSuggestions[0].innerHTML += 
                    "<span class='ist-tag-suggestion'>" + allTags[index] + "</span>";
                index += 1;
            }
        }

        // listen for clicks
        imageStoreApp.clickListener(imageStoreApp.targets);
    },
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
                results.push(tags[index].trim());
            }
            index += 1;
        }

        // render the results
        index = 0;
        if (results.length > 0) {
            // show
            imageStoreApp.targets.formSuggestionsPanel[0].style.display = "block";
            // clear
            clear(imageStoreApp.targets.formSuggestions[0]);
            imageStoreApp.targets.formSuggestions[0].innerHTML = "";
            while (index < results.length) {
                imageStoreApp.targets.formSuggestions[0].innerHTML += "<span class='ist-tag-suggestion'>" + results[index] + "</span>";
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
    processPageNoInput: function (inputVal, maxPages, destinationUrl, urlQueries) {
        "use strict";
        // got to the selected page
        if (inputVal <= maxPages) {
            window.location.href = destinationUrl + "?p=" + inputVal + urlQueries;
        }
    },
    pageNoListener: function (target, maxPages, destinationUrl, urlQueries) {
        "use strict";
        // listen for change in page number input
        target.pageNo.addEventListener("keypress", function(item) {
            if (item.key === "Enter" || item.keyCode === "13") {
                imageStoreApp.processPageNoInput(target.pageNo.value, maxPages, destinationUrl, urlQueries);
            }
        });
    },
    returnScroll: function () {
        // adjusts the scroll position when
        // returning to the home page
        var currPos = window.scrollY;
        var newPos = 45;

        if (currPos === 0) {
            window.scroll({
                top: newPos,
                left: 0,
                behavior: 'smooth'
            });
        } else {
            newPos = currPos - 60;
            window.scroll({
                top: newPos,
                left: 0,
                behavior: 'smooth'
            });
        }

        return false;
    },
    imgCtrls: function (target) {
        "use strict";
        // control the image size and panning
        var index = 0;
        var bgSize = 100;
        var bgPosX = 0;
        var bgPosY = 0;
        var bgIncr = 10;

        while (index < target.length) {
            target[index].addEventListener("click", function(item) {
                if (item.target.textContent === "+") {
                    // increase
                    // convert to number and remove "%"
                    // console.log(item.target.offsetParent.parentNode);
                    bgSize = Number(item.target.offsetParent.parentNode.style.backgroundSize.replace("%", ""));
                    bgSize += bgIncr;
                    bgSize = bgSize.toString() + "%";
                    item.target.offsetParent.parentNode.style.backgroundSize = bgSize;
                } else if (item.target.textContent === "–") {
                    // reduce
                    // convert to number and remove "%"
                    bgSize = Number(item.target.offsetParent.parentNode.style.backgroundSize.replace("%", ""));
                    bgSize -= bgIncr;
                    bgSize = bgSize.toString() + "%";
                    item.target.offsetParent.parentNode.style.backgroundSize = bgSize;
                } else if (item.target.textContent === "←") {
                    // move left
                    // convert to number and remove "px"
                    bgPosX = Number(item.target.offsetParent.parentNode.style.backgroundPositionX.replace("px", ""));
                    bgPosX -= bgIncr;
                    item.target.offsetParent.parentNode.style.backgroundPositionX = bgPosX.toString() + "px";
                } else if (item.target.textContent === "→") {
                    // move right
                    // convert to number and remove "px"
                    bgPosX = Number(item.target.offsetParent.parentNode.style.backgroundPositionX.replace("px", ""));
                    bgPosX += bgIncr;
                    item.target.offsetParent.parentNode.style.backgroundPositionX = bgPosX.toString() + "px";
                } else if (item.target.textContent === "↑") {
                    // move up
                    // convert to number and remove "px"
                    bgPosY = Number(item.target.offsetParent.parentNode.style.backgroundPositionY.replace("px", ""));
                    bgPosY -= bgIncr;
                    item.target.offsetParent.parentNode.style.backgroundPositionY = bgPosY.toString() + "px";
                } else {
                    // move down
                    bgPosY = Number(item.target.offsetParent.parentNode.style.backgroundPositionY.replace("px", ""));
                    bgPosY += bgIncr;
                    item.target.offsetParent.parentNode.style.backgroundPositionY = bgPosY.toString() + "px";
                }
            }, false);
            index += 1;
        }
    },
    handleImageSeqValues: function (name, value) {
        "use strict";
        imageStoreApp.targets.cartFinalSequence[Number(name)].value = value;
        return false;
    }
};
