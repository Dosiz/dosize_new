<?php


namespace App\Helpers;


class PointsHelper
{
    const Like = 1; //If user like product  or article then get 1 point
    const Comment = 3; //If user comment product  or article then get 3 point
    const ShareLink = 3; //If user share product  or article then get 3 point

    const Product = 1; //Source type 1 for product use in points table
    const Article = 2; //Source type 2 for article use in points table

}
