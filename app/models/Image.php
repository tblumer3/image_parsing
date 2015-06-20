<?php

class Image extends Eloquent {
    protected $fillable = array('image_id', 'image_url', 'no_action', 'confidence', 'type', 'aws_image_id', 'make', 'model', 'state', 'color', 'commercial', 'writing', 'hitch');

    protected $table = 'images';
}