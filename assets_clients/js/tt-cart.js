window.onload = function() {
    var curCost = 0;
    var curName = 0;
    var cartItems = [];
    var cindex = 0;
    var fx = 0,
        fy = 0;
    var tx = 0,
        ty = 0;
    var curItem = "";
    $("body").on("click", ".add-item", function(e) {
        curCost = $(this).attr("data-cost");
        curName = $(this).attr("data-name");
        curImage = $(this).attr("data-image");
        var id = $(this).attr("data-id");
        var x = $(this).position();
        fx = (((window.innerWidth) - 982) / 2) + (160 * (id - 1));
        (function() {
            mover_animator(fx, fy, tx, ty);
        })(setTimeout(function() {
            addItem(id, curCost, curName, curImage);
        }, 350));
    });



    $(document).on("click", ".cart-item-remove", function() {
        var rang = $(this).attr("index") - 1;

        cartItems.splice(rang, 1);

        carts_prod = $("#list_item").val();
        var total=0;
        if (carts_prod != "" && carts_prod != null){
            carts_prod = carts_prod.replace(/'/g, '"');
            carts_prod = JSON.parse(carts_prod);
            carts_qte = $("#list_qte").val();
            carts_qte = carts_qte.replace(/'/g, '"');
            carts_qte = JSON.parse(carts_qte);
            carts_price = $("#list_price").val();
            carts_price = carts_price.replace(/'/g, '"');
            carts_price = JSON.parse(carts_price);
            if (Array.isArray(carts_prod) && Array.isArray(carts_qte) && Array.isArray(carts_price)){
                if (carts_prod.length > 0 && carts_qte.length > 0 && carts_price.length > 0){
                    carts_prod.splice(rang, 1);
                    carts_qte.splice(rang, 1);
                    carts_price.splice(rang, 1);
                    if (carts_prod.length > 0 && carts_qte.length > 0 && carts_price.length > 0){
                        for (let i = 0; i < carts_prod.length; i++) {
                            total = total + carts_price[i]*carts_qte[i];
                        }
                        carts_prod = "["+carts_prod.toString()+"]";
                        carts_qte = "["+carts_qte.toString()+"]";
                        carts_price = "["+carts_price.toString()+"]";
                        $("#list_qte").val(carts_qte);
                        $("#list_item").val(carts_prod);
                        $("#list_price").val(carts_price);
                    }else {

                        $("#list_qte").val("");
                        $("#list_item").val("");
                        $("#list_price").val("");

                    }

                }
            }

        }
        $("#amount").val(total.toFixed(0));
        document.getElementById("cost_value").innerHTML = total.toFixed(0);

        this.parentNode.outerHTML='';
        toggleEptyCart();
        curCounter = $("#items .cart-item").length;
        $("#items-counter").empty();
        document.getElementById("items-counter").innerHTML += "<span class='animate'>" + curCounter +
            "<span class='circle'></span></span>";
        $('.cart-item-remove').each(function(index,item){

            $(this).attr('index',index+1);

        });
    })

    function addItem(id, cost) {
        id = parseInt(id);
        cost = parseInt(cost);
        index=0;
        carts_prod = $("#list_item").val();
        if (carts_prod != "" && carts_prod != null){
            carts_prod = carts_prod.replace(/'/g, '"');
            carts_prod = JSON.parse(carts_prod);
            carts_qte = $("#list_qte").val();
            carts_qte = carts_qte.replace(/'/g, '"');
            carts_qte = JSON.parse(carts_qte);
            carts_price = $("#list_price").val();
            carts_price = carts_price.replace(/'/g, '"');
            carts_price = JSON.parse(carts_price);

        }

        var count=1;
        let found = false;
        if (Array.isArray(carts_prod) && Array.isArray(carts_qte) && Array.isArray(carts_price)){
            if (carts_prod.length > 0 && carts_qte.length > 0 && carts_price.length > 0){
                carts_prod = carts_prod.map(Number);
                carts_qte = carts_qte.map(Number);
                carts_price = carts_price.map(Number);
                console.log(carts_prod);
                console.log(carts_qte);
                console.log(carts_price);
               index = carts_prod.indexOf(id);

                if (index != -1){
                    found = true;
                }
            }
        }else{
            carts_prod = [];
            carts_qte = [];
            carts_price = [];
        }
        cartItems = [];
        if (found){

            carts_qte[index] = carts_qte[index] + 1;
            count= carts_qte[index];
            for (let i = 0; i < carts_prod.length; i++) {
                cartItems[i] = carts_price[i]*carts_qte[i];
            }
            carts_qte = "["+carts_qte.toString()+"]";
            $("#list_qte").val(carts_qte);
            $(".cart-item-name_"+id).html(count +"* "+ curName);
            $(".cart-item-cvalue_"+id).html(count * cost);
            curCounter = $("#items .cart-item").length;
            document.getElementById("items-counter").innerHTML = "<span class='animate'>" + curCounter +
                "<span class='circle'></span></span>";
            return false;

        }else{
            count = 1;
            carts_prod.push(id);
            carts_qte.push(1);
            carts_price.push(cost);
            for (let i = 0; i < carts_prod.length; i++) {
                cartItems[i] = carts_price[i]*carts_qte[i];
            }
            carts_prod = "["+carts_prod.toString()+"]";
            carts_qte = "["+carts_qte.toString()+"]";
            carts_price = "["+carts_price.toString()+"]";
            $("#list_qte").val(carts_qte);
            $("#list_item").val(carts_prod);
            $("#list_price").val(carts_price);
        }

        $("#items-counter").empty();
        curCounter = $("#items .cart-item").length + 1;
        if (!found){
            document.getElementById("items").innerHTML += "<div class='cart-item' id='item" + cindex +
                "' data-id='" + id + "'><span class='cart-item-image'><img alt='" + curName + "' src='" + curImage +
                "'/></span><span class='cart-item-name h4 cart-item-name_" +id +
                "'>" + count +"* "+ curName +
                "</span><span class='cart-item-price'><span class='cvalue cvalue_" +id +
                "'>" + count * cost +
                " </span>FCFA</span> <span class='cart-item-remove' index='" + cartItems.length +"'><span class='ti-close'></span><span></div>";
            document.getElementById("items-counter").innerHTML += "<span class='animate'>" + curCounter +
                "<span class='circle'></span></span>";
            document.getElementById("item" + cindex).classList.remove("hidden");
        }

        toggleEptyCart();
    }

    function addCost(amount) {
        var oldcost = document.getElementById("cost_value").innerHTML;
        oldcost = parseFloat(oldcost);
        amount = parseFloat(amount);
        var newcost = oldcost + amount;
        document.getElementById("cost_value").innerHTML = newcost.toFixed(0);
        $("#amount").val(newcost.toFixed(0));
    }



    function removeCost(amount) {

        var oldcost = document.getElementById("cost_value").innerHTML;
        oldcost = parseFloat(oldcost);
        amount = parseFloat(amount);
        var newcost = (oldcost - amount);
        if (newcost == "NaN") {
            newcost = 0.00
        }

        document.getElementById("cost_value").innerHTML = newcost.toFixed(0);
        $("#amount").val(newcost.toFixed(0));
    }

    function mover_animator(x1, y1, x2, y2) {
        var div = document.createElement("div");
        div.className = "mover_animator " + cindex;
        div.style.display = "none";
        document.body.appendChild(div);
        $(div).css({
                "left": x1 + "px",
                "bottom": y1 + "px",
                "top": "auto",
                "right": "auto"
            })
            .fadeIn(10)
            .animate({
                "right": "auto",
                "top": "auto",
                "left": (window.innerWidth - 200) + "px",
                "bottom": (window.innerHeight - 240) + "px"
            }, 300, function() {
                addCost(curCost)
            })
        setTimeout(function() {
            $(div).remove();
            toggleEptyCart();
        }, 200);
    }

    function updateNumber() {
        var nums = document.querySelectorAll(".cart-item");
        var len = nums.length;
        if (len > 0) {
            for (var i = 0; i < len; i++) {
                nums[i].querySelector(".cart-item-name h3").innerHTML = "Item " + (i + 1) + " ---";
            }
        }
    }

    function toggleEptyCart() {
        if (document.querySelectorAll(".cart-item").length >= 1) {
            document.getElementById("cart-summary").style.display = "block";
            document.getElementById("cart-form").style.display = "block";
            document.getElementById("cart-empty").style.display = "none";
            document.getElementById("items-counter").style.display = "block";
        }
        else {
            document.getElementById("cart-summary").style.display = "none";
            document.getElementById("cart-form").style.display = "none";
            document.getElementById("cart-empty").style.display = "block";
            document.getElementById("items-counter").style.display = "none";
        }
    }

};