/** @package OMGF Pro | Remove Async Google Fonts @author Daan van den Bergh @copyright © 2017 - 2024 Daan.dev */
var head = document.getElementsByTagName('head')[0],
    insertBefore = head.insertBefore,
    appendChild = head.appendChild,
    append = head.append;

head.insertBefore = function (newElem, refElem) {
    return runInterception(newElem, refElem, 'insertBefore');
}

head.appendChild = function (newElem, refElem) {
    return runInterception(newElem, refElem, 'appendChild');
}

head.append = function (newElem, refElem) {
    return runInterception(newElem, refElem, 'append');
}

function runInterception(newElem, refElem, callback) {
    if ((typeof newElem.href !== 'undefined') && (newElem.href.includes('//fonts.googleapis.com/css') || newElem.href.includes('//fonts.gstatic.com/s/') || newElem.href.includes('//fonts.googleapis.com/icon') || newElem.href.includes('//ajax.googleapis.com/ajax/libs/webfont'))) {
        console.log('OMGF Pro blocked request to ' + newElem.href);

        return;
    }

    if ((typeof newElem.tagName !== 'undefined') && newElem.tagName === 'STYLE' && (typeof newElem.innerHTML !== 'undefined') && (newElem.innerHTML.includes('//fonts.googleapis.com/css') || newElem.innerHTML.includes('//fonts.gstatic.com/s/') || newElem.innerHTML.includes('//fonts.googelapis.com/icon'))) {
        console.log('OMGF Pro blocked inline style block: ' + newElem.innerHTML);

        return;
    }

    return eval(callback).call(head, newElem, refElem);
}
