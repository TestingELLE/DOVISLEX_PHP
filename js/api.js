var symbol=$("#symbol").text();
            
              window.onload = function(){
                //get current unix time
                var now = Math.floor(Date.now());
                $.getJSON('https://api.iextrading.com/1.0/tops/last?symbols=' + symbol, function(data) {

                    var latestPrice = data[0].price;
                    var timeUpdated = data[0].time;

                    //checking if api data has been updated the last 10 minutes
                    if (now - timeUpdated > 600000){

                      document.getElementById('api_return').innerHTML = latestPrice + "!!";

                    }else{

                      document.getElementById('api_return').innerHTML = latestPrice;
                      $.post("Latest_price_into_Main.php",data[0]);
                    }
                

            });
        };