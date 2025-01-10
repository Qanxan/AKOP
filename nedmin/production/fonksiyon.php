<?php
function seo($text)
{
    // Tüm karakter haritası
    $char_map = array(
        // Türkçe
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',

        // Rusça
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
        'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
        'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
        'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch',
        'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',

        // Yunanca
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E',
        'Ζ' => 'Z', 'Η' => 'I', 'Θ' => 'Th', 'Ι' => 'I', 'Κ' => 'K',
        'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => 'X', 'Ο' => 'O',
        'Π' => 'P', 'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y',
        'Φ' => 'F', 'Χ' => 'Ch', 'Ψ' => 'Ps', 'Ω' => 'O',

        // Arapça
        'ا' => 'a', 'ب' => 'b', 'ت' => 't', 'ث' => 'th', 'ج' => 'j',
        'ح' => 'h', 'خ' => 'kh', 'د' => 'd', 'ذ' => 'dh', 'ر' => 'r',
        'ز' => 'z', 'س' => 's', 'ش' => 'sh', 'ص' => 's', 'ض' => 'd',
        'ط' => 't', 'ظ' => 'z', 'ع' => 'a', 'غ' => 'gh', 'ف' => 'f',
        'ق' => 'q', 'ك' => 'k', 'ل' => 'l', 'م' => 'm', 'ن' => 'n',
        'ه' => 'h', 'و' => 'w', 'ي' => 'y',

        // İskandinav Dilleri
        'Å' => 'A', 'Ä' => 'Ae', 'Ö' => 'O', 'Ø' => 'O', 'Æ' => 'Ae',
        'å' => 'a', 'ä' => 'ae', 'ö' => 'o', 'ø' => 'o', 'æ' => 'ae',

        // Almanca
        'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue', 'ß' => 'ss',
        'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue',

        // Fransızca
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'ç' => 'c',

        // Diğer Latin harfleri
        'ÿ' => 'y', 'Ÿ' => 'Y', 'Ā' => 'A', 'ā' => 'a'
    );

    // Karakterleri harita ile değiştir
    $text = strtr($text, $char_map);

    // Karakterleri temizle ve özel durumlar için düzenle
    $text = preg_replace('/[^a-zA-Z0-9\-_]/u', '-', $text);
    $text = trim($text, '-'); // Baş ve sondaki tireyi temizle

    // UTF-8 kodlamayı doğrula ve sorunlu karakterleri düzelt
    $text = mb_convert_encoding($text, 'UTF-8', mb_detect_encoding($text));

    return strtolower($text);
}


?>
