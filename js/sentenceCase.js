/*
 * sentenceCase.js
 *
 * Purpose:
 * Google Translate correctly translates certain headings/titles,
 * but converts them to normal sentence text casing in French
 * (example: "consortiums d'institutions de recherche").
 *
 * We want:
 * "Consortiums d'institutions de recherche"
 *
 * Problem:
 * Google Translate modifies the DOM asynchronously and may
 * continue rewriting translated text for a short time after page load.
 *
 * Strategy used here:
 *
 * 1. Wait for Google Translate DOM activity using MutationObserver.
 * 2. When DOM activity stops for ~900 ms, assume translation is complete.
 * 3. Apply sentence case to selected heading classes.
 * 4. Immediately add:
 *        class="notranslate"
 *        translate="no"
 *    so Google Translate no longer touches these elements.
 * 5. Disconnect the observer permanently to avoid unnecessary activity.
 *
 * Notes:
 * - We intentionally capitalize ONLY the first character.
 * - We do NOT use CSS text-transform: capitalize because
 *   it capitalizes every word and produces poor French titles.
 * - This script is intended only for titles/headings,
 *   not for arbitrary paragraph text.
 */

document.addEventListener("DOMContentLoaded", function () {

    // Classes whose translated headings should be forced
    // into sentence case after Google Translate finishes.
    const selectors = '.materia, .argomento, .settore';

    /*
     * Converts:
     * "consortiums d'institutions de recherche"
     * into:
     * "Consortiums d'institutions de recherche"
     */
    function sentenceCase(str) {

        if (!str) return str;

        str = str.trim();

        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    /*
     * Applies sentence case to all matching elements,
     * then protects them from further Google Translate rewrites.
     */
    function applySentenceCase() {

        document.querySelectorAll(selectors).forEach(el => {

            const current = el.textContent;
            const corrected = sentenceCase(current);

            // Avoid unnecessary DOM rewrites.
            if (current !== corrected) {
                el.textContent = corrected;
            }

            // Prevent Google Translate from modifying
            // this element again after correction.
            el.classList.add('notranslate');
            el.setAttribute('translate', 'no');

        });
    }

    let timeout;

    /*
     * Observe DOM mutations caused by Google Translate.
     *
     * Each mutation resets the timer.
     * Once mutations stop for 900 ms,
     * we assume translation has stabilized.
     */
    const observer = new MutationObserver(function () {

        clearTimeout(timeout);

        timeout = setTimeout(function () {

            // Apply sentence case corrections.
            applySentenceCase();

            // Stop observing permanently.
            observer.disconnect();

        }, 900);
    });

    // Watch the entire page because Google Translate
    // dynamically replaces translated text nodes.
    observer.observe(document.body, {
        childList: true,
        subtree: true,
        characterData: true
    });

});