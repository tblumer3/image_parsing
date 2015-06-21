<?php

class S3lock extends Eloquent {
    protected $fillable = array('aws_image_id');

    protected $table = 's3locks';
}