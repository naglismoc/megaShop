<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Item extends Model
{
    use HasFactory;
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class,'item_parameters')->withPivot(['data']);
    }
    public function photos()
    {
        // return $this->belongsTo('App\Item', 'item_id', 'id');
        return $this->hasMany(Photo::class);
        
    }
    public function discountPrice(){
        // round( $item->price - (),2 )
        return $this->round_up(  $this->price - ($this->price *  ($this->discount / 100) ),2  );
    }

    public function round_up ( $value, $precision ) { 
        $pow = pow ( 10, $precision ); 
        return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
    } 
    public function card()
    {
        if( (!Auth::user() && $this->status==0) || 
        (Auth::user() && !Auth::user()->isAdministrator() && $this->status==0)  ){
        return;
     }
       $HTML =  '<a href="' .route('item.show', ( ( (  ( (  ($this->id*3)  +6)  *3)  +7) *13) +6)* 124) . '" >
        <div class="Item '; 
        if($this->status==0) {
            $HTML.= " bg-redish ";
        }elseif($this->quantity==0){
                $HTML .=" inactive ";
            }
        
            $HTML.= '">
          <div style="text-align:center;" > '. $this->name  .'</div>
            <div style="border: solid red 1px; margin-left:10px; width:230px;height:230px; position: relative; ">';
              if(count($this->photos) > 0){
               $HTML.= ' <img style="max-height:230px;  width:100%; position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="'.asset("/images/items/small/".$this->photos[0]->name).'" alt="">'; 
              }else{
                $HTML.= ' <img style="max-height:230px;    position:absolute; top:50%;left:50%; transform:translate(-50%,-50%);" src="'.asset("/images/icons/itemDefault.png").'" alt=""> ';
               }
               $HTML.= ' </div>';
            if($this->discount > 0){
                $HTML.= ' <div style="margin-left:25px; text-decoration:line-through; text-decoration-thickness: 2px; font-weight:900; font-size:18px; position:relative">'.$this->price.'€';
                $HTML.= ' <div  style="position:absolute; padding: 0 7px;  background-color:blue; color:yellow;  transform: rotate(-12deg); font-size:25px; bottom:35px; right:20px;">'.$this->discountPrice() .'</div>';
            }else{
                $HTML.= ' <div style="margin-left:25px; font-weight:900; font-size:18px; position:relative">'.$this->price.'€';
            }
            $HTML.= ' </div>';
            $HTML.= '<div style="margin-left:25px;" >Gamintojas: '.$this->manufacturer.'</div>';
            $HTML.= ' <div style="margin-left:25px;" >Prekės likutis: '.$this->quantity.'</div>';
            $HTML.= '<object><a style="margin-left:80px;"  '.($this->status==0 ||$this->quantity==0)?"avoid-clicks":"".'  class="btn btn-danger" href="">Į krepšelį</a> </object>';
           
            $HTML.= '  <div class="heart"></div>
          </div>
      </a> ';
      return $HTML;
    }
}
