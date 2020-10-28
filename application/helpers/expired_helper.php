<?php 

function set_expired()
{
  $ci =& get_instance();

  // Set expired on table: tabeltemuan
  $sql1 = "UPDATE tabeltemuan SET tahunan='1' 
           WHERE NOW() >= DATE_ADD(waktu_temuan, INTERVAL 1 YEAR)";
  $ci->db->query($sql1);
}

function set_expired_hilang()
{
  $ci =& get_instance();

  // Set expired on table: tabelkehilangan
  $sql1 = "UPDATE tabelkehilangan SET status='1' 
           WHERE NOW() >= DATE_ADD(waktu_kehilangan, INTERVAL 1 YEAR)";
  $ci->db->query($sql1);
}
