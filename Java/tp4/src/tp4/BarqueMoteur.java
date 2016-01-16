package tp4;


public class BarqueMoteur extends Barque {
	private int puiss;
	public BarqueMoteur(String nom,int num,int puiss){
		super(nom,num);
		this.puiss=puiss;
	}
	public int getPuissance(){
		return puiss;
	}
    public String toString(){
	return super.toString()+"    puissance"+puiss;
    }

}
