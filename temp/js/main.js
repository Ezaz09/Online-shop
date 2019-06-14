var API_URL = "/api/";
function sendAjaxRequest(method, url, data, callback) {
    var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
    var xhr = new XHR();
    xhr.open(method, API_URL + url, true);
    xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(JSON.parse(xhr.responseText));
        }
    };
      

    xhr.send(JSON.stringify(data));
}

function getCategories() {
    sendAjaxRequest("GET", "product/categories", null, function(response){
        if (response) {
            generateCategories(response);
        }
    });
}

function generateCategories(response){

    response.map(function(element){
        addCategori(element);
    });

}

function addCategori(categori) {

    var newElement = document.createElement('li');

    newElement.addEventListener('click',function(event){
        getProduct(categori['id'])
    });

    newElement.innerHTML = `<a href = #>${categori['rus_name']}</a>`;

    document.querySelector('.categori-vrapper').appendChild(newElement);

}

function getProduct(id=null){

        var pr = document.querySelector('.product-vrapper');
        if(pr){
        var url =  (id) ? `product/index?id=${id}` : 'product/index';
        var clear = document.querySelector('.product-vrapper');
        clear.innerHTML = ""; 
        
        sendAjaxRequest("GET", url, null, function(response){
            if (response) {
                generateProduct(response);
            }
        });
    }
}

function generateProduct(response){

    response.map(function(element){
        addProduct(element);
    });

}

function addProduct(categori) {

    var newElement = document.createElement('div');
    newElement.classList.add('card');
    newElement.innerHTML = `
    <a href="product.php?product=${categori['title']}">
        <img src="img/${categori['img']}" alt="${categori['price']}""Фото">
    </a>
    <div class="label">${categori['rus_name']} (${categori['price']} рублей)</div>
    <form action="actions/add.php" method="post">
        <input type="hidden" name="id" value=${categori['id']}>
        <input type="submit" value="Добавить в корзину">
    </form>`;

    document.querySelector('.product-vrapper').appendChild(newElement);

}

function email(event){
    var json = {
        "order":{
            "email":event.target[2].value,
            "fio":event.target[0].value,
            "phone":event.target[1].value
        }
    };
    sendAjaxRequest("POST", "order/create", json, function(response){
        if (response) {
           alert('Ваш заказ оформлен!');
        }
    });
}

function initData(){
    getCategories();
    getProduct();
    initForm();
}

function initForm(){
    var form = document.querySelector(".product-form");
    if(form){
        form.addEventListener("submit" ,function(event){
            event.preventDefault();
            email(event);
            return false;
        });
    }
}

window.addEventListener("load", initData());











