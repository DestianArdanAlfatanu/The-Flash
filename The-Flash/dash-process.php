<?php
    include_once ('koneksi.php');

    $nama = '';
    $info = '';
    $sinopsis = '';
    $poster = '';
    $banner = '';
    $link = '';

    $edit_state_movie = false;
    $edit_state_comic = false;

    if(isset($_POST['save'])){
        if($_POST['from_page'] == 'movie'){
            $nama = $_POST['nama_film'];
            $info = $_POST['info'];
            $sinopsis = $_POST['sinopsis'];
            $poster = $_FILES['poster']['name'];
            $banner = $_FILES['banner']['name'];
            $link = $_POST['link'];

            $query_save = "INSERT INTO `film` (nama_film, info, sinopsis, poster, banner, link)
                    VALUES ('$nama','$info','$sinopsis','$poster','$banner','$link');";
            if(mysqli_query($koneksi, $query_save)){
                move_uploaded_file($_FILES['poster']['tmp_name'], "image/poster/" . $poster);
                move_uploaded_file($_FILES['banner']['tmp_name'], "image/banner/" . $banner);
                header('Location: dash-movies.php');
            }else{
                mysqli_close($koneksi);
            }
        }else if($type === 'comic'){

        }
    }

    if(isset($_POST['update'])){
        if($_POST['from_page'] == 'movie'){
            $id = $_POST['id'];
            $nama = $_POST['nama_film'];
            $info = $_POST['info'];
            $sinopsis = $_POST['sinopsis'];
            $poster = $_FILES['poster']['name'];
            $banner = $_FILES['banner']['name'];
            $link = $_POST['link'];

            $query_update = "UPDATE `film` SET nama_film='$nama', info='$info', sinopsis='$sinopsis', poster='$poster',
                    banner='$banner', link='$link' WHERE id_film='$id';";
            if(mysqli_query($koneksi, $query_update)){
                move_uploaded_file($_FILES["poster"]["tmp_name"], "image/poster/" . $poster);
                move_uploaded_file($_FILES['banner']['tmp_name'], "image/banner/" . $banner);
                header('Location: dash-movies.php');
            }else{
                mysqli_close($koneksi);
            }
        }else if($type === 'comic'){

        }
    }

    if(isset($_GET['delMovie'])){
        $id = $_GET['delMovie'];
        mysqli_query($koneksi, "DELETE FROM `film` WHERE id_film='$id';");
        header('Location: dash-movies.php');
    }

    if(isset($_GET['delComic'])){
        $id = $_GET['delComic'];
        mysqli_query($koneksi, "DELETE FROM `comic` WHERE id_comic='$id';");
        header('Location: dash-comics.php');
    }


?>