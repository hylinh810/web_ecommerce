@foreach($comment as $productComment)
    <div class="comment_clearfix " style="display:flex;margin-bottom: 10px;align-items: center">
        <img src="front/img/avatar-default.jpg" width="100px"/>
        <div>
        <div class="comment_author_infos">
            <strong style="font-size: 15px;">{{$productComment->name}} </strong>
            <em style="margin-left: 10px">{{ date('d/m/Y', strtotime($productComment->create_date)) }}</em>
        </div>
        <div class="comment_details" >
            <p>{{$productComment->comment}}</p>
        </div>
        </div>
    </div>
@endforeach