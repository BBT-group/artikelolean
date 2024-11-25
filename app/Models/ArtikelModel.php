<?php

namespace App\Models;

use CodeIgniter\Model;
use DOMDocument;
use DOMXPath;

class ArtikelModel extends Model
{
    protected $table = 'ms_artikel';
    protected $primaryKey = 'id_ms_artikel';
    protected $allowedFields = ['judul', 'isi','tanggal', 'aktif', 'viewer', 'id_ms_kategori_artikel'];

    public function getArtikelWithKategori($id)
    {
        return $this->join('ms_kategori_artikel', 'ms_artikel.id_ms_kategori_artikel = ms_kategori_artikel.id_ms_kategori_artikel')
            ->where(['ms_artikel.id_ms_artikel' => $id])
            ->first();
    }
    public function incrementViewer($id)
    {
        $data = $this->find($id);
        $this->set('viewer', $data['viewer'] ? $data['viewer'] + 1 : 1, false)
            ->where('id_ms_artikel', $id)
            ->update();
    }
    public function extractThumbnail($isi)
    {

        // // Sample text containing HTML
        // $text = $isi;

        // // Optionally decode HTML entities if text is encoded
        // $html = htmlspecialchars_decode($text);

        // // Regex to match img tags and extract the src attribute
        // preg_match('/<img[^>]+src="([^">]+)"/i', $html, $matches);

        // // Extracted src URLs are in the second element of $matches

        // $imgSrcs = $matches[1];



        // // If an image is found, return its URL, otherwise return a placeholder
        // return $matches ? $imgSrcs : 'path/to/default-thumbnail.jpg';

        $html = htmlspecialchars_decode($isi);

        // Regex to match img tags and extract the src attribute
        preg_match('/<img[^>]+src="([^">]+)"/i', $html, $matches);

        // Check if $matches[1] is set and assign its value, otherwise use a default value
        $imgSrcs = isset($matches[1]) ? $matches[1] : 'path/to/default-thumbnail.jpg';

        // Return the image URL or the default placeholder
        return $imgSrcs;
    }

    public function extractSnippet($isi, $limit = 150)
    {
        // Strip HTML tags and limit content to the first 150 characters
        $cleanText = strip_tags($isi);
        if (strlen($cleanText) > $limit) {
            return substr($cleanText, 0, $limit) . '...'; // Limit and append '...'
        }
        return $cleanText;
    }

    public function getDailyViewerData()
    {
        $query = $this->db->query("
            SELECT judul, SUM(viewer) as daily_viewers 
            FROM ms_artikel 
            
        ");

        return $query->getResultArray();
    }
    public function getTop10MostViewed()
    {
        return $this->orderBy('viewer', 'DESC')->limit(10)->findAll();
    }
}
