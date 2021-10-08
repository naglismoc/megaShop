
// if(document.getElementById("showItem")){
// console.log("sveiki");
// }

const { default: axios } = require("axios");

// console.log(window.location.href.includes("map")," vaikstau po kategorijas");
// console.log(window.location.href.includes("show")," esu prekeje");
let drpDwn = document.getElementById("lines");
let searchBar = document.getElementById("searchBar");
if(searchBar){
   
    // searchBar.addEventListener('keyup',sbr );
    searchBar.addEventListener('keyup', function (e) {
        let timeout = null;
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            let txt = searchBar.value;
            axios.post(urlSearchBar,{
                searchBar : searchBar.value
            })
            .then(function(response){
                console.log(response.data.items);
                
                let HTML ='';
                response.data.items.forEach(item => {
                    HTML += ' <a href="#">'+item["name"]+'</a>';
                });
                drpDwn.innerHTML = HTML;
                document.getElementById('searchBar').focus();
                // sbr();
            });

            // console.log('Value:', searchBar.value);
        }, 700);
    });
   
}
// function sbr() {
    
//     let timeout = null;

//     searchBar.addEventListener('keyup', function (e) {
       
//         clearTimeout(timeout);
//         timeout = setTimeout(function () {
//             let txt = searchBar.value;
//             axios.post(urlSearchBar,{
//                 searchBar : searchBar.value
//             })
//             .then(function(response){
//                 console.log(response.data.items);
//                 let drpDwn = document.getElementById("myDropdown");
//                 let HTML ='<input type="text" placeholder="Search.." id="searchBar">';
//                 response.data.items.forEach(item => {
//                     HTML += ' <a href="#">'+item["name"]+'</a>';
//                 });
//                 drpDwn.innerHTML = HTML;
//                 document.getElementById('searchBar').value = txt;
//                 document.getElementById('searchBar').focus();
//                 sbr();
//             });

//             // console.log('Value:', searchBar.value);
//         }, 700);
//     });
// }

document.getElementById('myDropdown').addEventListener('focusout',function(){
    drpDwn.innerHTML = "";
});

// document.getElementById('myDropdown').addEventListener('mouseout',function(){
    // drpDwn.innerHTML = "";
// });





  


// axios.get(url)
// .then(function(response){
//     console.log(response.data.msg);
// });



//plain js (fetch)
//ajax 
//axios


  
