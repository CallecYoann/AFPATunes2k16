<?php

class Tracks
{
  private $id;
  private $title;
  private $artist;
  private $duration;
  private $year;


  function __construct($id, $title, $artist, $duration, $year) {
      $this->id = $id;
      $this->title = $title;
      $this->artist = $artist;
      $this->duration = $duration;
      $this->year = $year;
  }


  function getTitle() {
      return $this->title;
  }

  function getArtist() {
      return $this->artist;
  }

  function getDuration() {
      return $this->duration;
  }

  function getYear() {
      return $this->year;
  }


  function setTitle($title) {
      $this->title = $title;
  }

  function setArtist($artist) {
      $this->artist = $artist;
  }

  function setDuration($duration) {
      $this->duration = $duration;
  }

  function setYear($year) {
      $this->year = $year;
  }


}
