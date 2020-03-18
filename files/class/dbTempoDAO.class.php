<?php 
class dbTempoDAO {

    public $p=NULL;

    public function __construct(){
        $this->p = new Connection();
    }

    public function add( $dbTempo ){
        try{
            $stmt = $this->p->prepare("INSERT temp_data ( `city`, `max`, `min`, `precipitation`, `date`) VALUES ( ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $dbTempo->getCity() );
            $stmt->bindValue(2, $dbTempo->getMax() );
            $stmt->bindValue(3, $dbTempo->getMin() );
            $stmt->bindValue(4, $dbTempo->getPrecipitation() );
            $stmt->bindValue(5, $dbTempo->getDate() );			
            $stmt->execute();
            // fecha a conexão
            $this->p = null;
        }
        catch(PDOException $e){
            echo "Erro: ". $e->getMessage();
        }
    } 
    public function select($query=null)
    {
    	try
	{
            if( $query == null )
            {
		        $stmt = $this->p->query("SELECT * FROM temp_data ORDER BY id DESC");
            }
            else
            {
		        echo $stmt = $this->p->query($query);
            }
            $this->p = null;
            return $stmt;
            }
	
            catch ( PDOException $ex )
            {
		        echo "Erro: ".$ex->getMessage();
            }
    }
    public function update( $dbTempo, $id )
    {
        try
        {
                $stmt = $this->p->prepare("UPDATE temp_data SET  `city`=?, `max`=?, `min`=?, `precipitation`=?, `date`=?  WHERE `id`=$id");
                $stmt->bindValue(1, $dbTempo->getCity() );
                $stmt->bindValue(2, $dbTempo->getMax() );
                $stmt->bindValue(3, $dbTempo->getMin() );
                $stmt->bindValue(4, $dbTempo->getPrecipitation() );
                $stmt->bindValue(5, $dbTempo->getDate() );	
                $stmt->execute();
                // fecha a conexão
                $this->p = null;
                
        }
        catch ( PDOException $ex )
        {
            echo "Erro: ".$ex->getMessage();
        }
    }
}