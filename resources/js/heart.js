
Array.from(document.getElementsByClassName("heart")).forEach(item => {
    item.addEventListener('click',function () {
    this.classList.toggle("liked");
    console.log(this.parentElement.getAttribute("href").replace("javascript:void(0)/",""));
    axios.post(heart,{
        id : this.parentElement.getAttribute("href").replace("javascript:void(0)/","")
    })
    .then(function(response){
      console.log(response.data);
    });
    });
});

