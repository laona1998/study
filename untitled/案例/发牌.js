var compeleteCards = new Array();
var mytimer;
var cardSequence = 1;
var player1 = new Array();
//储存玩家一的手牌
var player2 = new Array();
//储存玩家二的手牌
var player3 = new Array();
//储存玩家三的手牌v
var player4 = new Array();
//储存玩家四的手牌

function Cards(number,type){
    var card = {
        number: number,
        type: type
    }
    return card;
}

function CreatCompeleteCard() {
    var arr = new Array();
    for (var i = 3; i <= 15; i++) {
        for (var j = 1; j <= 4; j++) {
            var card = Cards(i, j);
            arr.push(card);
        }
    }
    return arr;
}


function Show() {
    function typeShow(type) {
        var t;
        switch(type) {
            case 1:
                t= "♠"
                break;
            case 2:
                t = "♣";
                break;
            case 3:
                t = "<font color='#FFO000'>♦</font>";
                break;
            case 4:
                t= "<font color='#FFO000'>♥</font>";
                break;
        }
        return t;
    };
    function numberShow(number) {
        var n = number;
        switch(number) {
            case 11:
                n = "J";
                break;
            case 12:
                n = "Q";
                break;
            case 13:
                n = "K";
                break;
            case 14:
                n = "A";
                break;
            case 15:
                n = "2";
                break;
        }
        return n;
    };

    function arrayToShow(array, id) {
        var html = "";
        for (var i = 0; i < array.length; i++) {
            html += "<div class='card'><b>" + typeShow(array[i].type) + "</b><div class='number'>" + numberShow(array[i].number) + "</div></div>";
        }
        document.getElementById(id).innerHTML = html;
    };
    arrayToShow(compeleteCards, "compeleteCards");
    arrayToShow(player1, "player1");
    arrayToShow(player2, "player2");
    arrayToShow(player3, "player3");
    arrayToShow(player4, "player4");
}

function SortCards() {
    if (compeleteCards.length == 52) {
        compeleteCards.sort(function(a, b) {
            return 0.5 - Math.random();
        });
    }
}

function DealCards() {
    if (compeleteCards.length == 52) {
        mytimer = setInterval("GetCards(compeleteCards.shift())", 100);
    }
}

function GetCards(CardObj) {
    switch(cardSequence) {
        case 1:
            var k = InCardsIndex(player1, CardObj);
            player1.splice(k, 0, CardObj);
            cardSequence = 2;
            break;
        case 2:
            var k = InCardsIndex(player2, CardObj);
            player2.splice(k, 0, CardObj);
            cardSequence = 3;
            break;
        case 3:
            var k = InCardsIndex(player3, CardObj);
            player3.splice(k, 0, CardObj);
            cardSequence = 4;
            break;
        case 4:
            var k = InCardsIndex(player4, CardObj);
            player4.splice(k, 0, CardObj);
            cardSequence = 1;
            break;
    }
    if (compeleteCards.length == 0) {
        window.clearTimeout(mytimer);
    }
    Show();
}


function InCardsIndex(arr, obj) {
    var len = arr.length;
    if (len == 0) {
        return 0;
    }else if (len == 1) {
        if (obj.number >= arr[0].number) {
            return 1;
        } else {
            return 0;
        }
    }else {
            var backi = -1;
            for (var i = 0; i < len; i++) {
                if (obj.number <= arr[i].number) {
                    backi = i;
                    break;
                }
            }
            if (backi == -1) {
                backi = len;
            }
            return backi;
        }
    }

//在此添加代码

document.getElementById("create").onclick = function() {
    compeleteCards = CreatCompeleteCard();
    Show();
};
document.getElementById("sort").onclick = function() {
    SortCards();
    Show();
};
document.getElementById("deal").onclick = function() {
    DealCards();
}; 