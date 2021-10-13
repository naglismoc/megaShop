
// if(document.getElementById("showItem")){
// console.log("sveiki");
// }

const { default: axios } = require("axios");

// console.log(window.location.href.includes("map")," vaikstau po kategorijas");
// console.log(window.location.href.includes("show")," esu prekeje");
let drpDwn = document.getElementById("lines");
let searchBar = document.getElementById("searchBar");
let houseOfCards = document.getElementById("houseOfCards");

if(searchBar){
   
    searchBar.addEventListener('keyup', function (e) {
        let timeout = null;
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            axios.post(urlSearchBar,{
                searchBar : searchBar.value
            })
            .then(function(response){
                let HTML ='';
                let HTMLCards ='';
                response.data.items.forEach(item => {
                    HTML += ' <a href="'+itemShow.substring(0, itemShow.length -1)+
                    +( ( (  ( (  (item['id']*3)  +6)  *3)  +7) *13) +6)* 124
                    +'">'+item["name"]+'</a>';

                //     HTMLCards += `<a href="#" >
                //     <div class="Item  {{ (`+item['status']+`==0) ? " bg-redish " :( (`+item['quantity']+`==0?" inactive ":"" ) }}">
                //       <div style="text-align:center;" >`+item['name']+`</div>
                //         <div style="border: solid red 1px; margin-left:10px; width:230px;height:230px; position: relative; ">
                //           @if(count($item->photos) > 0)
                //             <img style="max-height:230px;  width:100%; position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/items/small/".$item->photos[0]->name)}}" alt=""> 
                //           @else
                //             <img style="max-height:230px;    position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="{{asset("/images/icons/itemDefault.png")}}" alt=""> 
                //           @endif
                //         </div>
                //         @if($item->discount > 0)
                //         <div style="margin-left:25px; text-decoration:line-through; text-decoration-thickness: 2px; font-weight:900; font-size:18px; position:relative">{{$item->price}}€
                //           <div  style="position:absolute; padding: 0 7px;  background-color:blue; color:yellow;  transform: rotate(-12deg); font-size:25px; bottom:35px; right:20px;">{{$item->discountPrice()}} </div>
                //         @else
                //         <div style="margin-left:25px; font-weight:900; font-size:18px; position:relative">{{$item->price}}€
                            
                //           @endif
                //         </div>
                //         <div style="margin-left:25px;" >Gamintojas: {{$item->manufacturer}}</div>
                //         <div style="margin-left:25px;" >Prekės likutis: {{$item->quantity}}</div>
                //         <object><a style="margin-left:80px;"  {{($item->status==0 ||$item->quantity==0)?"avoid-clicks":""}}  class="btn btn-danger" href="">Į krepšelį</a> </object>
                //         {{-- <button style="margin-left:80px; z-index:99" class="btn btn-danger">Į krepšelį</button> --}}
                //         <div class="heart"></div>
                //       </div>
                //   </a>`


                });
                drpDwn.innerHTML = HTML;
                // houseOfCards.innerHTML = HTMLCards;
            });
        }, 700);
    });
   
}
// document.getElementById('myDropdown').addEventListener('focusout',function(){
//     drpDwn.innerHTML = "";
// });


  
