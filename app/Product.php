<?php



namespace App;





use Illuminate\Database\Eloquent\Model;



class Product extends Model {



    public function cat()

    {

        return $this->belongsTo('App\Category', 'category_id');

    }



    public function paypalItem()

    {

        $price = (is_object($this->cat) && $this->cat->slug == 'Promociones') ? $this->promotion_pricing :  $this->pivot->preciounit;



        return \PaypalPayment::item()->setName($this->descripcion)

            ->setDescription($this->descripcion)

            ->setCurrency('USD')

            ->setQuantity($this->pivot->qty)

            ->setPrice($this->pivot->preciounit);

    }



    public function scopeLatest($query)

    {

        return $query->orderBy("id", "desc");

    }



    public function scopeSearch($query, $title)

    {

        return $query->where('title', 'like', '%' . $title . '%');



    }



    public function favorite_users()

    {

        return $this->belongsToMany('App\User', 'user_favorite_products', 'product_id', 'user_id');

    }


   

}

