var id;

function bookmarkDone(transport) {
        
    if($(id).src.indexOf('plus.png') == -1)
        $(id).src = $(id).src.replace('minus.png', 'plus.png');
    else $(id).src = $(id).src.replace('plus.png', 'minus.png');
}

function callAjaxBookmark(id1, s, baseurl) {

    id = id1;
    var myAjax = new Ajax.Request(baseurl + '/ajax/bookmark', 
                                   {method: 'get', parameters: {id: s}, 
                                   onComplete: bookmarkDone});
}

function tbookDone(transport) {
    
    if($('tbookcount' + id).value > 0 && ($('tbookcountg' + id).innerHTML - $('tbookcount' + id).value) >= 0) {
        $('tbookcountg' + id).innerHTML = $('tbookcountg' + id).innerHTML - $('tbookcount' + id).value;
        $('bull' + id).style.color = "#05b300";
    }
    else $('bull' + id).style.color = "#e41b1b";

}

function callAjaxTbook(s, s1,  baseurl) {

    id = s1;
    s2 = $('tbookcount' + id).value;
    if($('tbookcount' + id).value > 0 && ($('tbookcountg' + id).innerHTML - $('tbookcount' + id).value) >= 0)
        var myAjax = new Ajax.Request(baseurl + '/ajax/tbook', 
                                       {method: 'get', parameters: {readerid: s, bookid: s1, count: s2}, 
                                       onComplete: tbookDone});
    else tbookDone('');
}

function rbookDone(transport) {
    
    if($('rbookcount' + id).value > 0 && ($('rbookcountt' + id).innerHTML - $('rbookcount' + id).value) >= 0) {
        $('rbookcountg' + id).innerHTML = parseInt($('rbookcountg' + id).innerHTML) + parseInt($('rbookcount' + id).value);
        $('rbookcountt' + id).innerHTML = $('rbookcountt' + id).innerHTML - $('rbookcount' + id).value;
        $('bull' + id).style.color = "#05b300";
    }
    else $('bull' + id).style.color = "#e41b1b";
    

}

function callAjaxRbook(s, s1,  baseurl) {

    id = s1;
    s2 = $('rbookcount' + id).value;
    if($('rbookcount' + id).value > 0 && ($('rbookcountt' + id).innerHTML - $('rbookcount' + id).value) >= 0)
        var myAjax = new Ajax.Request(baseurl + '/ajax/rbook', 
                                       {method: 'get', parameters: {readerid: s, bookid: s1, count: s2}, 
                                       onComplete: rbookDone});
    else rbookDone('');
}
