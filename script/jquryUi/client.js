
String.prototype.endsWith = function (suffix)
{
    return this.indexOf(suffix, this.length - suffix.length) !== -1;
};


String.prototype.trimAll = function ()
{
    return $.trim(this)
        .replace(/\s*[\r\n]+\s*/g, '\n')
        .replace(/(<[^\/][^>]*>)\s*/g, '$1')
        .replace(/\s*(<\/[^>]+>)/g, '$1');
};


function getQueryString(name)
{
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)", "ig");
    var qs = regex.exec(window.location.href);

    if (qs)
        return qs[1];
    else
        return '';
}

function validateEmail(email)
{
    //"asghar" <asghar@gmail.com>,

    var regex = new RegExp("([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})", "ig");
    var result = regex.exec(email);
    if (result)
        return result[1];
    else
        return null;
}

function validateMobile(mobile)
{
    var regex = new RegExp(/\+\d{12}/);
    var result = regex.exec(mobile);
    if (result)
        return result[0];
    else
        return null;
}

function format(str)
{
    for (var i = 1; i < arguments.length; i++)
    {
        str = str.replace("{" + (i - 1) + "}", arguments[i]);
    }
    return str;
}

function TryParseInt(str, defaultValue)
{
    return /^\d+$/.test(str) ? parseInt(str) : defaultValue;
}

function GetKeyPressed(e)
{
    var keycode;

    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;
    else
        keycode = -1;

    return keycode;
}

function ReloadPage(url)
{
    if (url)
        window.location.href = url;
    else
        window.location.href = window.location.href;

    //    var href;
    //    if (url)
    //        href = url;
    //    else
    //        href = location.href;
    //
    //    location.href = "about:blank";
    //    location.href = href;
}

function S4()
{
    return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
}
function GenerateGUID()
{
    return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4());
}

// *********************
// *********************
// *********************
function Ajaxify(url, data)
{
    $.post(url, data,
        function (js)
        {
            try
            {
                eval(js);
            }
            catch (err)
            {
                alert('خطایی رخ داده است\n' + err);
            }
        });
}


function Ajaxer(data)
{
    var url = '/ControlPanel/Ajaxify.aspx';

    Ajaxify(url, data);
}


// *********************
// *********************
// *********************



// *********************
// ***** jqWindow ******
// *********************

function OpenWindow(url, title, width, height, modal, refreshParentOnClose)
{
    var d;
    if (url == '')
        d = $('#jqwin').html('');
    else if (height == 0)
        d = $('#jqwin').html('<iframe id="ifrm" frameborder="0" scrolling="auto" style="width: 100%;height: 100%;" onload="Set_IFRAME_Height();"></iframe>');
    else
        d = $('#jqwin').html('<iframe id="ifrm" frameborder="0" scrolling="auto" style="width: 100%;height: 100%;"></iframe>');

    d.dialog({
        dialogClass: 'rtl',
        position: 'center',
        closeOnEscape: true,
        draggable: true,
        resizable: true,
        width: width,
        modal: modal,
        title: title
        , beforeClose: function ()
        {
            if (refreshParentOnClose)
            {
                window.parent.CallBackFunction();
            }
        }
    });
    d.dialog({ position: 'center' });

    if (height != 0)
    {
        d.dialog({ height: height + 15, position: 'center' });
    }

    var randqs = 'dgrnd=' + S4() + S4() + S4();
    var url2;
    if (url.indexOf('?') > -1)
        url2 = url + '&' + randqs;
    else
        url2 = url + '?' + randqs;

    var ifrm = $("#jqwin>#ifrm");
    ifrm.attr("src", url2);

    return d;
}

function CloseWindow()
{
    var d = window.parent.$("#jqwin");
    d.dialog('close');
}

function CloseWindowAndCallBackParent(args)
{
    window.parent.$("#jqwin").dialog('close');
    if (window.parent.CallBackFunction)
        window.parent.CallBackFunction(args);
}

function Set_IFRAME_Height()
{
    var iframe = document.getElementById("ifrm");
    var h;

    if (iframe.contentDocument)
    {
        h = iframe.contentDocument.body.offsetHeight;
    }
    else
    {
        h = iframe.contentWindow.document.body.scrollHeight;
    }

    if (h > 600)
        h = 600;

    var d = window.parent.$("#jqwin");
    d.dialog({ height: h + 60 });
    d.dialog({ position: 'center' });


    //window.parent.$("#jqwin").dialog({ height: h + 50, position: 'center' });
    //    window.parent.$("#jqwin").dialog("option", "position", "center");
}


/**********/
/**********/
/**********/

function AttachInput2Button(inputSelector, buttonSelector)
{
    $(inputSelector).keyup(function (event)
    {
        if (event.keyCode == 13)
        {
            $(buttonSelector).click();
        }
    });
}
