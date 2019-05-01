<?php

use Illuminate\Database\Seeder;
use App\News;
use App\Category;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();

        $categories = Category::all();
       for ($i=0; $i < 20; ) {  
            foreach ($categories as $category) {      
                         
                $record = new News();
                $record->title = 'Новость '.$category->name.' '.($i++);   
                $record->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent felis magna, dignissim eget dapibus at, pretium vitae mauris. Praesent ut tincidunt lorem, et molestie massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur purus mi, facilisis at libero vitae, suscipit facilisis dolor. Nunc sit amet lobortis massa. Pellentesque velit urna, tincidunt ut laoreet at, maximus ut turpis. Donec ut velit sit amet quam porttitor varius. Aliquam at congue dolor.';

                $record->content = 
'<p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent felis magna, dignissim eget dapibus at, pretium vitae mauris. Praesent ut tincidunt lorem, et molestie massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur purus mi, facilisis at libero vitae, suscipit facilisis dolor. Nunc sit amet lobortis massa. Pellentesque velit urna, tincidunt ut laoreet at, maximus ut turpis. Donec ut velit sit amet quam porttitor varius. Aliquam at congue dolor.
          </p>
          <p>
          Vivamus lobortis eleifend nulla sit amet gravida. Donec id ornare purus. Aenean a posuere arcu. Phasellus vitae ante tortor. Pellentesque dictum cursus mollis. Aliquam dignissim erat malesuada faucibus accumsan. In hendrerit ante dolor, nec accumsan nisl cursus eget. Suspendisse suscipit ornare lorem sed consectetur.
          </p>
          <p>
          Phasellus libero massa, suscipit id cursus at, dapibus eu risus. Nam porttitor sapien lorem, at dapibus velit faucibus nec. Curabitur nunc tellus, fringilla id mollis in, pellentesque id tellus. Morbi ut vehicula lectus. Nunc at velit felis. Sed sodales pulvinar dolor non fermentum. Donec et tristique tellus. Donec maximus lectus vel velit euismod, in tristique risus consectetur. In laoreet quis nulla sit amet consectetur. Donec bibendum ante ligula, luctus viverra augue viverra id. Nullam sed viverra metus. Cras placerat sem eget convallis tempus. Donec non dapibus justo.
          </p>
          <p>
          Cras non lorem a velit egestas congue. Nullam leo odio, pharetra ac libero vel, rhoncus finibus nibh. Donec a lobortis magna. Cras euismod leo in rhoncus elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed aliquam, mauris vel aliquet facilisis, sapien lectus viverra odio, id euismod felis ipsum in felis. Sed condimentum velit tellus, nec facilisis nulla dictum ac. Ut et rhoncus ligula.
          </p>
          <p>
          Suspendisse mattis, leo et pellentesque lacinia, tellus mauris aliquam dolor, id lacinia eros metus non nulla. Sed pellentesque dolor sed urna scelerisque consequat. Nullam imperdiet elit ut enim volutpat luctus. Morbi gravida nibh sed efficitur tempus. Phasellus eget massa efficitur, sodales erat at, sodales purus. Proin commodo elit vel iaculis finibus. Donec sed porta orci. Morbi sed egestas ex. Vivamus ultrices interdum sapien at congue. Sed faucibus a dui imperdiet consectetur. Ut fringilla tincidunt molestie.
          </p> ';          
                // $record->save();

                $record->category()->associate($category);

                $record->save();
                // $category->news()->
            } 
        }
    }
}
