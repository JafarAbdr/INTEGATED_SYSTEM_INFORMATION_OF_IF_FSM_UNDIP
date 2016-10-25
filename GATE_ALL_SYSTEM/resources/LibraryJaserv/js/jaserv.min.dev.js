// JavaScript source code
(function () {
    temp = {};
    
    j = function (id) {
        this.about = {
            version: "1.1 rev 0",
            company: "jaservTech"
        };
        this.varAjax;
        this.elmt;
        /*standard IO Object*/
        //getObject return object with id is or class is or tag name is
        this.getObject = function () {
            return this.elmt;
        };
        //getInHtml return innerHTML of element' if <div><a></a></div> so innerHTML of div is "<a></a>"
        this.getInHtml = function () {
            return this.elmt.innerHTML;
        };
        //setInHtml a= "string tag that will inserted on tag elmt"
        this.setInHtml = function (a) {
            this.elmt.innerHTML = a;
        };
        //getValue return value of elmt
        this.getValue = function () {
            return this.elmt.value;
        };
        //setValue a  = string that will be value on elmt
        this.setValue = function (a) {
            this.elmt.value = a;
        };
        //-->ajax session<--
        //getXMLHTTPRequest return XMLHttpRequest 
        this.getXMLHTTPRequest = function (){
            try{
                return new XMLHttpRequest();
            }catch(err){
                try{
                    return new ActiveXObject("Msxml2.XMLHTTP");
                }catch(err){
                    try{
                        return new ActiveXObject("Microsoft.XMLHTTP");
                    }catch(err){
                        return false;
                    }
                }
            }
        };
        //setAjax a = {methode : "....", url:".....",bool: true||false, content = ".......&....", sucOk : function (){...}}
        this.setAjax = function (a){
            var varAjax = this.getXMLHTTPRequest();
            if(a.methode){
                if(a.url){
                    if((a.bool == true) || (a.bool ==false)){
                        
                    }else return false;
                }else return false;
            }else return false;
            
            if((a.methode == "GET") || (a.methode == "get")){
                if(a.content)
                    {
                        var url = a.url+"?"+a.content;
                    }
                else{
                    var url = a.url;
                }
            }
            if((a.methode == "POST") || (a.methode == "post")){
                var url = a.url;   
            }
            varAjax.open(a.methode, url,a.bool);
            varAjax.onreadystatechange = function (){
                if((varAjax.readyState == 4)&&(varAjax.status == 200)){
                    a.sucOk(varAjax.responseText);
                }else{
                	if(a.sucEr){
                		a.sucEr(varAjax.readyState,varAjax.status);
                	}
                }
            }
            if((a.methode == "POST") || (a.methode == "post")){
                varAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                if(a.content){
                    varAjax.send(a.content);   
                }else{
                    varAjax.send("");
                }
            }else{
                varAjax.send();
            }
        };
        /*Style Executor*/
        //getStyleValue a = "height" or "weight" or "display"
        this.getStyleValue = function (a) {
            return window.getComputedStyle(this.elmt).getPropertyValue(a);
        };
        /*Event Handler*/
        //setTrigger event = "click" or "mouseover" or  "mouseout"
        this.setTrigger = function (event) {
            if (document.createEvent) {
                this.elmt.dispatchEvent(document.createEvent("MouseEvents").initEvent(event, true, false));
            } else if (document.createEventObject) {
                this.elmt.fireEvent("on" + event, document.createEventObject);
            }
        };
        //setEventListener a = "click" or "blur" ... and b = function(){ -->code will run<-- }
        this.setEventListener = function(a,b){
            this.elmt.addEventListener(a,b,true);
        };
        //setOnClick a = function(){ -->code will run<-- }
        this.setOnClick = function (a) {
            this.setEventListener("click", a);
        };
        //setOnChange a = function(){ -->code will run<-- }
        this.setOnChange = function (a) {
            this.setEventListener("change", a);
        };
        //setOnBlur a = function(){ -->code will run<-- }
        this.setOnBlur = function (a) {
            this.setEventListener("blur", a);
        };
        //setOnMouseOver a = function(){ -->code will run<-- }
        this.setOnMouseOver = function (a) {
            this.setEventListener("mouseover", a);
        };
        //setOnMouseOut a = function(){ -->code will run<-- }
        this.setOnMouseOut = function (a) {
            this.setEventListener("mouseout", a);
        };
        //setOnFocus a = function(){ -->code will run<-- }
        this.setOnFocus = function (a) {
            this.setEventListener("focus", a);
        };
        if (id) {
            if (window === this) {
                return new j(id);
            }
            if (id != undefined) {
                if (id[0] == '#')
                    this.elmt = document.getElementById(id.substr(1, id.length));
                else if (id[0] == '.')
                    this.elmt = document.getElementsByClassName(id.substr(1, id.length));
                else
                    this.elmt = document.getElementsByTagName(id);
            }
            return this;

        } else {
            return this.about;
        }
    }
})(window)

//to add more function please use this syntax
/*
j.prototype = {
    <name of methode> : <function name>,
    <name of methode> : <function name>
};
to use about
j().version;
j().company;
*/
