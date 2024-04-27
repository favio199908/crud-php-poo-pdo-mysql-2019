<?php
class Consulta{

    public function listarAutorCodigo($bd, $table){
        $sql = "select * from $table";
        $query = $bd->prepare($sql);
        $query->execute();
        $autor = $query->fetchAll(PDO::FETCH_ASSOC);
        return $autor;
    }
    //Este método muestra el listatdo de todas las películas
    public function listarPeliculas($bd,$movies){
        $sql = "select * from $movies";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
    public function listarGeneros($bd,$genres){
        $sql = "select * from $genres";
        $query = $bd->prepare($sql);
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $generos;

    }
    //Método para agregar una nueva película
    public function guardarPelicula($bd,$movies,$pelicula){
        $sql = "insert into $movies (title,rating,awards,release_date,length,genre_id) values (:title,:rating,:awards,:release_date,:length,:genre_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getReleaseDate());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre());
        $query->execute();
        header('location:index.php');

    }
    //Este método muestra el detalle de una película selecciona de la lista por parte del usuario
    public function detallePelicula($bd,$movies,$genres,$id){
        $sql = "select $movies.*,$genres.name from $movies,$genres where $movies.genre_id =$genres.id and $movies.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $pelicula = $query->fetch(PDO::FETCH_ASSOC);
        
        return $pelicula;
    }
    //Este es el método que controla la busqueda de las películas
    public function buscarPelicula($bd,$tabla,$busqueda){
        $sql = "select * from $tabla where title like :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda',"%".$busqueda."%");
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Este método controla el borrado de la película que el usuario selecione
    public function borrarpelicula($bd,$movies,$id){
        $sql = "delete from $movies where id = :id";
        $query = $bd->prepare($sql);
        $query->bindvalue(':id',$id);
        $query->execute();
    }
    //Método para realizar la edición o modificación de los datos de alguna película
    public function actualizarPelicula($bd,$movies,$pelicula,$id){
        $sql = "update $movies set title=:title,rating=:rating,awards=:awards,release_date=:release_date, length=:length,genre_id=:genre_id where $movies.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getReleaseDate());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre());
        $query->execute();
        header('location:index.php');
      }
      // Este método muestra el listado de todas las series
    public function listarSeries($bd, $table){
        $sql = "SELECT * FROM $table";
        $query = $bd->prepare($sql);
        $query->execute();
        $series = $query->fetchAll(PDO::FETCH_ASSOC);
        return $series;
    }

    // Método para agregar una nueva serie
    public function guardarSerie($bd, $table, $serie){
        $sql = "insert into $table (title, release_date, end_date, genre_id) VALUES (:title, :release_date, :end_date, :genre_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $serie->getTitle());
        $query->bindValue(':release_date', $serie->getReleaseDate());
        $query->bindValue(':end_date', $serie->getEndDate());
        $query->bindValue(':genre_id', $serie->getGenre());
        $query->execute();
        header('Location: listado_series.php');
    }

    // Método para mostrar el detalle de una serie seleccionada
    public function detalleSerie($bd, $series, $genres, $id){
        $sql = "select $series.*, $genres.name FROM $series, $genres WHERE $series.genre_id = $genres.id AND $series.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $serie = $query->fetch(PDO::FETCH_ASSOC);
        return $serie;
    }

    // Método para buscar series
    public function buscarSerie($bd, $table, $busqueda){
        $sql = "select * from $table where title like :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda', "%" . $busqueda . "%");
        $query->execute();
        $series = $query->fetchAll(PDO::FETCH_ASSOC);
        return $series;
    }

    // Método para borrar una serie
    public function borrarSerie($bd, $table, $id){
        $sql = "delete from $table where id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
    }

    // Método para actualizar una serie
    public function actualizarSerie($bd, $table, $serie, $id){
        $sql = "update $table set title=:title, release_date=:release_date, end_date=:end_date, genre_id=:genre_id where $table.id=:id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $serie->getTitle());
        $query->bindValue(':release_date', $serie->getReleaseDate());
        $query->bindValue(':end_date', $serie->getEndDate());
        $query->bindValue(':genre_id', $serie->getGenre());
        $query->bindValue(':id', $id);
        $query->execute();
        header('Location: listado_series.php');
    }
    // Método para listar todas las temporadas
    public function listarTemporadas($bd, $table){
        $sql = "select * from $table";
        $query = $bd->prepare($sql);
        $query->execute();
        $temporadas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $temporadas;
    }

    // Método para agregar una nueva temporada
    public function guardarTemporada($bd, $table, $temporada){
        $sql = "insert into $table (title, number, release_date, end_date, serie_id) values (:title, :number, :release_date, :end_date, :serie_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $temporada->getTitle());
        $query->bindValue(':number', $temporada->getNumber());
        $query->bindValue(':release_date', $temporada->getReleaseDate());
        $query->bindValue(':end_date', $temporada->getEndDate());
        $query->bindValue(':serie_id', $temporada->getSerie());
        $query->execute();
        header('Location:listado_temporadas.php'); // Redirige al listado de temporadas
    }

    // Método para mostrar el detalle de una temporada seleccionada
    public function detalleTemporada($bd, $table, $series, $id){
        $sql = "select $table.*, $series.title as serie_title from $table, $series where $table.serie_id = $series.id and $table.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $temporada = $query->fetch(PDO::FETCH_ASSOC);
        return $temporada;
    }

    // Método para buscar temporadas
    public function buscarTemporada($bd, $table, $busqueda){
        $sql = "SELECT * FROM $table WHERE title LIKE :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda', "%" . $busqueda . "%");
        $query->execute();
        $temporadas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $temporadas;
    }

    // Método para borrar una temporada
    public function borrarTemporada($bd, $table, $id){
        $sql = "delete from $table where id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        header('Location: listado_temporadas.php');
    }

    // Método para actualizar una temporada
    public function actualizarTemporada($bd, $table, $temporada, $id){
        $sql = "UPDATE $table SET title=:title, number=:number, release_date=:release_date, end_date=:end_date, serie_id=:serie_id WHERE $table.id=:id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $temporada->getTitle());
        $query->bindValue(':number', $temporada->getNumber());
        $query->bindValue(':release_date', $temporada->getReleaseDate());
        $query->bindValue(':end_date', $temporada->getEndDate());
        $query->bindValue(':serie_id', $temporada->getSerie());
        $query->bindValue(':id', $id);
        $query->execute();
        header('Location: listado_temporadas.php'); // Redirige al listado de temporadas
    }
}
  
