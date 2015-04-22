var myOverlay;

function showLoading(){
    myOverlay = new documentOverlay();
    overlayElement = myOverlay.element;
    myOverlay.css({
        background: 'black',
        opacity: 0.5,
        filter: 'alpha(opacity=50)'
    });
    overlayElement.ondblclick = function(){
        //alert('This is about to close!');
        myOverlay.remove();
    }
    myOverlay.init();
}

function closeLoading(){
    if(myOverlay !== null)
    {
        myOverlay.remove();
    }
}

function documentOverlay() {
    // Shortcut to current instance of object:
    var instance = this,
 
    // Cached body height:
    bodyHeight = (function(){
        return getDocDim('Height','min');    
    })();
 
    // CSS helper function:
    function css(el,o) {
        for (var i in o) { el.style[i] = o[i]; }
        return el;
    };
 
    // Document height/width getter:
    function getDocDim(prop,m){
        m = m || 'max';
        return Math[m](
            Math[m](document.body["scroll" + prop], document.documentElement["scroll" + prop]),
            Math[m](document.body["offset" + prop], document.documentElement["offset" + prop]),
            Math[m](document.body["client" + prop], document.documentElement["client" + prop])
	);
    }
 
    // get window height: (viewport):
    function getWinHeight() {
        return window.innerHeight ||
                (document.compatMode == "CSS1Compat" && document.documentElement.clientHeight || document.body.clientHeight);
    }
 
    // Public properties:
 
    // Expose CSS helper, for public usage:
    this.css = function(o){
        css(instance.element, o);
        return instance;
    };
 
    // The default duration is infinity:
    this.duration = null;
 
    // Creates and styles new div element:
    this.element = (function(){
        return css(document.createElement('div'),{
            width: '100%',
            height: getDocDim('Height') + 'px',
            position: 'absolute', zIndex: 1060,
            left: 0, top: 0,
            cursor: 'wait'
        });
    })();
 
    //Creates loading modal  
    this.loadingelement = (function(){
        return css(document.createElement('div'),{
            position : 'absolute',
            top: ($(window).height() / 2)+'px',
            left: ($(window).width() / 2)+'px',
            margin: '-50px 0px 0px -50px',
            width: '100px',
            height: '100px',
            color: '#888',
            zIndex: 1061,
            font: '36px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif'
        });
    })();
    
    this.loadingelement.innerHTML = '<center><i class="icon ion-loading-a"></i><br>Loading...<center>';
    this.element.appendChild(this.loadingelement);
    
    // Resize cover when window is resized:
    window.onresize = function(){
 
        // No need to do anything if document['body'] is taller than viewport
        if(bodyHeight>getWinHeight()) { return; }
 
        // We need to hide it before showing
        // it again, due to scrollbar issue.
        instance.css({display: 'none'});
        setTimeout(function(){
            instance.css({
                height: getDocDim('Height') + 'px',
                display: 'block'
            });
        }, 10);
 
    };
 
    // Remove the element:
    this.remove = function(){
        this.element.parentNode && this.element.parentNode.removeChild(instance.element);
    };
 
    // Show element:
    this.show = function(){};
 
    // Event handling helper:
    this.on = function(what,handler){
        what.toLowerCase() === 'show' ? (instance.show = handler)
        : instance.element['on'+what] = handler;
        return instance;
    };
 
    // Begin:
    this.init = function(duration){
 
        // Overwrite duration if parameter is supplied:
        instance.duration = duration || instance.duration;
 
        // Inject overlay element into DOM:
        document.getElementsByTagName('body')[0].appendChild(instance.element);
 
        // Run show() (by default, an empty function):
        instance.show.call(instance.element,instance);
 
        // If a duration is supplied then remove element after
        // the specified amount of time:
        instance.duration && setTimeout(function(){instance.remove();}, instance.duration);
 
        // Return instance, for reference:
        return instance;
 
    };
 
}
     
$(document).ready(function() {

    if($('table[UItable]').length > 0)
    {
        $('table[UItable]').DataTable();

        $('div[id$=filter]').find("input[type='search']").addClass('form-control').width(120).height(9);
    }   
    /******************************
    * Numeric Number Fields
    *******************************/
    $('.numeric').keydown(function(e){
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});