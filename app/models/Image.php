<?php

class Image extends Eloquent {
    protected $fillable = array('image_name', 'make', 'model', 'state', 'color', 'commercial', 'writing', 'hitch');

    protected $table = 'images';
    
}