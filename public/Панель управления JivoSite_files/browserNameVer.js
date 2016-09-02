function browserNameVer() {
    var N = navigator.appName, ua = navigator.userAgent.toLowerCase(), p = navigator.platform.toLowerCase(), tem;
    var M = ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    var mac = p ? /mac/.test(p) : /mac/.test(ua);
    if(M && (tem = ua.match(/version\/([\.\d]+)/i))!= null) M[2] = tem[1];
    M = M? [M[1], M[2]]: [N, navigator.appVersion,'-?'];
    M.mac = mac;
    return M;
}