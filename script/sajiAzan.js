/***
 * @ name: izans time (prayer time)
 * @ Version: 1.0
 * @ Date: 19/09/2007

 ***/

(function (global, owghat, undefined) {
    var __m = "10";
    var __d = 8;
    var __lg = undefined;
    var __lat = undefined;
    var azan_t1 = {};
    var azan_t2 = {};
    var azan_t3 = {};
    var azan_t4 = {};
    var azan_t5 = {};
    var azanday, azanjoomlacmsmonth;

    function showdate(newDate) {
//        a = new Date();
        if(!newDate) {
            newDate = new Date();
        }
        _d = newDate.getDay();
        day = newDate.getDate();
        joomlacmsmonth = newDate.getMonth() + 1;
        year = newDate.getYear();
        year = (year == 0) ? 2000 : year;
        (year < 1000) ? (year += 2000) : true;
        year -= ( (joomlacmsmonth < 3) || ((joomlacmsmonth == 3) && (day < 21)) ) ? 622 : 621;
        switch (joomlacmsmonth) {
            case 1:
                (day < 21) ? (joomlacmsmonth = 10, day += 10) : (joomlacmsmonth = 11, day -= 20);
                break;
            case 2:
                (day < 20) ? (joomlacmsmonth = 11, day += 11) : (joomlacmsmonth = 12, day -= 19);
                break;
            case 3:
                (day < 21) ? (joomlacmsmonth = 12, day += 9) : (joomlacmsmonth = 1, day -= 20);
                break;
            case 4:
                (day < 21) ? (joomlacmsmonth = 1, day += 11) : (joomlacmsmonth = 2, day -= 20);
                break;
            case 5:
            case 6:
                (day < 22) ? (joomlacmsmonth -= 3, day += 10) : (joomlacmsmonth -= 2, day -= 21);
                break;
            case 7:
            case 8:
            case 9:
                (day < 23) ? (joomlacmsmonth -= 3, day += 9) : (joomlacmsmonth -= 2, day -= 22);
                break;
            case 10:
                (day < 23) ? (joomlacmsmonth = 7, day += 8) : (joomlacmsmonth = 8, day -= 22);
                break;
            case 11:
            case 12:
                (day < 22) ? (joomlacmsmonth -= 3, day += 9) : (joomlacmsmonth -= 2, day -= 21);
                break;
            default:
                break;
        }
//        document.getElementById("azanday").value = day;
        azanday = day;
//        document.getElementById("azanjoomlacmsmonth").value = joomlacmsmonth;
        azanjoomlacmsmonth = joomlacmsmonth;
    }

    function main(city, date) {
        showdate(date);
        coord(city);
//        var i = document.getElementById("cities").selectedIndex;
        var i = 12;
        if (i == 0)
            return;
//        var m = document.getElementById("azanjoomlacmsmonth").value;
//        var d = eval(document.getElementById("azanday").value);
//        var lg = eval(document.getElementById("longitude").value);
//        var lat = eval(document.getElementById("latitude").value);
        var ep = sun(__m, __d, 4, __lg);
        var zr = ep[0];
        delta = ep[1];
        ha = loc2hor(108.0, delta, __lat);
        var t1 = Round(zr - ha, 24);
        ep = sun(__m, __d, t1, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(108.0, delta, __lat);
        var t1 = Round(zr - ha + 0.025, 24);

//        document.getElementById("azan_t1").innerHTML = hms(t1);
//        document.getElementById("azan_ht1").value = hhh(t1);
//        document.getElementById("azan_mt1").value = mmm(t1);
        azan_t1.t = hms(t1);
        azan_t1.ht = hhh(t1);
        azan_t1.mt = mmm(t1);

        ep = sun(__m, __d, 6, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(90.833, delta, __lat);
        var t2 = Round(zr - ha, 24);
        ep = sun(__m, __d, t2, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(90.833, delta, __lat);
        t2 = Round(zr - ha + 0.008, 24);

//        document.getElementById("azan_t2").innerHTML = hms(t2);
//        document.getElementById("azan_ht2").value = hhh(t2);
//        document.getElementById("azan_mt2").value = mmm(t2);
        azan_t2.t = hms(t2);
        azan_t2.ht = hhh(t2);
        azan_t2.mt = mmm(t2);

        ep = sun(__m, __d, 12, __lg);
        ep = sun(__m, __d, ep[0], __lg);
        zr = ep[0] + 0.01;

//        document.getElementById("azan_t3").innerHTML = hms(zr);
//        document.getElementById("azan_ht3").value = hhh(zr);
//        document.getElementById("azan_mt3").value = mmm(zr);
        azan_t3.t = hms(zr);
        azan_t3.ht = hhh(zr);
        azan_t3.mt = mmm(zr);

        ep = sun(__m, __d, 18, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(90.833, delta, __lat);
        var t3 = Round(zr + ha, 24);
        ep = sun(__m, __d, t3, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(90.833, delta, __lat);
        t3 = Round(zr + ha - 0.014, 24);

//        document.getElementById("azan_t4").innerHTML = hms(t3);
//        document.getElementById("azan_ht4").value = hhh(t3);
//        document.getElementById("azan_mt4").value = mmm(t3);
        azan_t4.t = hms(t3);
        azan_t4.ht = hhh(t3);
        azan_t4.mt = mmm(t3);

        ep = sun(__m, __d, 18.5, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(94.3, delta, __lat);
        var t4 = Round(zr + ha, 24);
        ep = sun(__m, __d, t4, __lg);
        zr = ep[0];
        delta = ep[1];
        ha = loc2hor(94.3, delta, __lat);
        t4 = Round(zr + ha + 0.013, 24);

//        document.getElementById("azan_t5").innerHTML = hms(t4);
//        document.getElementById("azan_ht5").value = hhh(t4);
//        document.getElementById("azan_mt5").value = mmm(t4);
        azan_t5.t = hms(t4);
        azan_t5.ht = hhh(t4);
        azan_t5.mt = mmm(t4);
//        setTimeout("main()", 60000);
//        shownow();
        return {morning: azan_t1, sunrise: azan_t2, noon: azan_t3, sunset: azan_t4, morocco: azan_t5};
    }

    function sun(m, d, h, lg) {
        if (m < 7)
            d = 31 * (m - 1) + d + h / 24;
        else
            d = 6 + 30 * (m - 1) + d + h / 24;
        var M = 74.2023 + 0.98560026 * d;
        var L = -2.75043 + 0.98564735 * d;
        var lst = 8.3162159 + 0.065709824 * Math.floor(d) + 1.00273791 * 24 * (d % 1) + lg / 15;
        var e = 0.0167065;
        var omega = 4.85131 - 0.052954 * d;
        var ep = 23.4384717 + 0.00256 * cosd(omega);
        var ed = 180.0 / Math.PI * e;
        var u = M;
        for (var i = 1; i < 5; i++)
            u = u - (u - ed * sind(u) - M) / (1 - e * cosd(u));
        var v = 2 * atand(tand(u / 2) * Math.sqrt((1 + e) / (1 - e)));
        var theta = L + v - M - 0.00569 - 0.00479 * sind(omega);
        var delta = asind(sind(ep) * sind(theta));
        var alpha = 180.0 / Math.PI * Math.atan2(cosd(ep) * sind(theta), cosd(theta));
        if (alpha >= 360)
            alpha -= 360;
        var ha = lst - alpha / 15;
        var zr = Round(h - ha, 24);
        return ([zr, delta])
    }

    function init() {
        lgs = [0, 49.70, 48.30, 45.07, 51.64, 48.68, 46.42, 57.33, 56.29, 50.84, 59.21, 46.28, 51.41, 48.34, 49.59, 60.86, 48.50, 53.06, 53.39, 47.00, 50.86, 52.52, 50.00, 50.88, 57.06, 47.09, 54.44, 59.58, 48.52, 51.59, 54.35];
        lats = [0, 34.09, 38.25, 37.55, 32.68, 31.32, 33.64, 37.47, 27.19, 28.97, 32.86, 38.08, 35.70, 33.46, 37.28, 29.50, 36.68, 36.57, 35.58, 35.31, 32.33, 29.62, 36.28, 34.64, 30.29, 34.34, 36.84, 36.31, 34.80, 30.67, 31.89];
    }

    function coord(cityIndex) {
//        var c = document.getElementById("cities");
//        var i = c.selectedIndex;
        if (!cityIndex) {
//            document.getElementById("longitude").value = "";
//            document.getElementById("latitude").value = "";
            __lg = lgs[12].toString();
            __lat =lats[12].toString();
        }
        else {
//            document.getElementById("longitude").value = lgs[i].toString()
//            document.getElementById("latitude").value = lats[i].toString()
            __lg = lgs[cityIndex].toString();
            __lat = lats[cityIndex].toString();
        }
    }

    function sind(x) {
        return(Math.sin(Math.PI / 180.0 * x));
    }

    function cosd(x) {
        return(Math.cos(Math.PI / 180.0 * x));
    }

    function tand(x) {
        return(Math.tan(Math.PI / 180.0 * x));
    }

    function atand(x) {
        return(Math.atan(x) * 180.0 / Math.PI);
    }

    function asind(x) {
        return(Math.asin(x) * 180.0 / Math.PI);
    }

    function acosd(x) {
        return(Math.acos(x) * 180.0 / Math.PI);
    }

    function sqrt(x) {
        return(Math.sqrt(x));
    }

    function frac(x) {
        return(x % 1);
    }

    function floor(x) {
        return(Math.floor(x));
    }

    function ceil(x) {
        return(Math.ceil(x));
    }

    function loc2hor(z, d, p) {
        return(acosd((cosd(z) - sind(d) * sind(p)) / cosd(d) / cosd(p)) / 15);
    }

    function Round(x, a) {
        var tmp = x % a;
        if (tmp < 0)
            tmp += a;
        return(tmp)
    }

    function hms(x) {
        x = Math.floor(3600 * x);

        h = Math.floor(x / 3600) + JAT;

        mp = x - 3600 * h;
        m = Math.floor(mp / 60) + (JAT * 60);
        s = Math.floor(mp - 60 * m) + (JAT * 3600);

        return(((h < 10) ? "0" : "") + h.toString() + ":" + ((m < 10) ? "0" : "") + m.toString() + ":" + ((s < 10) ? "0" : "") + s.toString())
    }

    function hhh(x) {
        x = Math.floor(3600 * x);
        h = Math.floor(x / 3600) + JAT;
        mp = x - 3600 * h;
        m = Math.floor(mp / 60);
        s = Math.floor(mp - 60 * m);
        return(((h < 10) ? "0" : "") + h.toString())
    }

    function mmm(x) {
        x = Math.floor(3600 * x);
        h = Math.floor(x / 3600);
        mp = x - 3600 * h;
        m = Math.floor(mp / 60);
        s = Math.floor(mp - 60 * m);
        return(((m < 10) ? "0" : "") + m.toString())
    }

    var currentTimess = new Date()
    var yearss = currentTimess.getYear();

    var dayss = currentTimess.getYear()
    var XDayss = new Date("January, 1, " + yearss + "");

    var DayCountss = (currentTimess - XDayss) / (1000 * 60 * 60 * 24);
    DayCountss = Math.round(DayCountss);

    var JATS
    if (DayCountss > 80 && DayCountss < 265) {


        JATS = 1;
    }
    else {
        JATS = 0;
    }

    var JAT = JATS;


    function getOwghat(city, date) {
        init();
        return main(city, date);
    }

    var cities = {"TEHRAN":12,"ARAK":1,"ARDABIL":2,"OROOMIEH":3,"ESFAHAN":4,"AHVAZ":5,"ILAM":6,"BOJNOORD":7,"BANDARABBAS":8,"BOOSHEHR":9,"BIRJAND":10,"TABRIZ":11,"KHORAMABABD":13,"RASHT":14,"ZAHEDAN":15,"ZANJAN":16,"SARI":17,"SEMNAN":18,"SANANDEJ":19,"SHAHREKORD":20,"SHIRAZ":21,"QAZVIN":22,"QOM":23,"KERMAN":24,"KERMANSHAH":25,"GORGAN":26,"MASHAD":27,"HAMADAN":28,"YASOOJ":29,"YAZD":30};
    owghat.getCities = function(){
        return cities;
    };
    owghat.getOwghat = getOwghat;

})(this, ( window.owghat = window.owghat || {}));



