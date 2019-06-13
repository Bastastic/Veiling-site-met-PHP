var CountDown   =   function(data)
    {
        // Assign this object
        var thisObj =   this;
        // Make sure all settings are not left undefined
        data.send_to        =   (typeof data.send_to === "undefined")? "time1" : data.send_to;
        data.backcolor      =   (typeof data.backcolor === "undefined")? "white" : data.backcolor;
        data.forecolor      =   (typeof data.forecolor === "undefined")? "black" : data.forecolor;
        data.targetdate     =   (typeof data.targetdate === "undefined")? "12/31/2020 5:00 AM" : data.targetdate;
        data.displayformat  =   (typeof data.displayformat === "undefined")? "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds." : data.displayformat;
        data.countactive    =   (typeof data.countactive === "undefined")? true : data.countactive;
        data.message        =   (typeof data.message === "undefined")? "Ended" : data.message;
        data.countstepper   =   (typeof data.countstepper != "number")? -1 : data.countstepper;
        data.leadingzero    =   (typeof data.leadingzero === "undefined")? true : data.leadingzero;
        // Get DOM object
        var domObj          =   document.getElementById(data.send_to);

        this.calcage    =   function(secs, num1, num2)
            {
                var s = ((Math.floor(secs/num1))%num2).toString();

                if(data.leadingzero && s.length < 2)
                    s = "0" + s;

                return "<b>" + s + "</b>";
            }

        this.putSpan    =   function(backcolor, forecolor)
            {
                // Modify html instead of making html
                domObj.style.backgroundColor    =   backcolor;
                domObj.style.color              =   forecolor;
            }

        this.writeBoard =   function(secs,countDownEngine)
            {
                if(secs <= 0) {
                    clearInterval(countDownEngine);
                    domObj.innerHTML = data.message;
                    return;
                }

                var DisplayStr      =   '';
                DisplayStr          =   data.displayformat.replace(/%%D%%/g, thisObj.calcage(secs,86400,100000));
                DisplayStr          =   DisplayStr.replace(/%%H%%/g, thisObj.calcage(secs,3600,24));
                DisplayStr          =   DisplayStr.replace(/%%M%%/g, thisObj.calcage(secs,60,60));
                DisplayStr          =   DisplayStr.replace(/%%S%%/g, thisObj.calcage(secs,1,60));
                domObj.innerHTML    =   DisplayStr;
            }

        this.create =   function()
            {   
                data.countstepper = Math.ceil(data.countstepper);

                if(data.countstepper == 0)
                    data.countactive = false;

                var SetTimeOutPeriod = ((Math.abs(data.countstepper)-1)*1000) + 990;

                thisObj.putSpan(data.backcolor, data.forecolor);

                var dthen   =   new Date(data.targetdate);
                var dnow    =   new Date();
                var nowCalc =   (data.countstepper > 0)? (dnow-dthen) : (dthen-dnow);
                var ddiff   =   new Date(nowCalc);
                var gsecs   =   Math.floor((ddiff.valueOf()/1000));

                var countDownEngine =   setInterval(function() {
                    gsecs   =   gsecs+data.countstepper;
                    thisObj.writeBoard(gsecs,countDownEngine);
                }, 1000);
            }
    }
// Create instance of your countdown with it's own settings
var counterOne  =   new CountDown({
    // This is the id name for the container (<div id="time1"></div>)
    send_to:'time1',
    forecolor:'red',
    targetdate:'09/22/2016 9:39 AM'
});
// Create instance #2 with it's own settings
var counterTwo  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time2',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterThree  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time3',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterFour  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time4',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterFive  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time5',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterSix  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time6',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterSeven  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time7',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterEight  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time8',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterNine  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time9',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterTen  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time10',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterEleven  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time11',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterTwelve  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time12',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
var counterThirteen  =   new CountDown({
    // This is the id name for the container (<div id="time2"></div>)
    send_to:'time13',
    forecolor:'blue',
    targetdate:'05/22/2019 9:40 AM'
});
// Apply the creation method
// Without .create(), nothing will happen since all the working
// script to apply the counter is in this method
counterOne.create();
counterTwo.create();
counterThree.create();
counterFour.create();
counterFive.create();
counterSix.create();
counterSeven.create();
counterEight.create();
counterNine.create();
counterEleven.create();
counterTwelve.create();
counterThirteen.create();
counterTen.create();