import { treeChristmas } from "fontawesome";
import React from "react";
import ReactDOM from "react-dom/client";



class Accordeon extends React.Component{
    state = {
       categories: [
            {id: 1, 
                title: "Photo" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "url('build/uploads/acc_02.jpg')",
                brightness : "1",
                transform: "scale(1)",
                size : "400%"
            },
            {id: 2, 
                title: "Sculture" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "url('build/uploads/Marie.jpg')",
                brightness : "0",
                transform: "scale(1)",
                size : "100%"
            },
            {id: 3, 
                title: "Peinture" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "url('build/uploads/bg_01.jpg')",
                brightness : "0",
                transform: "scale(1)",
                size : "100%"
            },
            
       ]
    }
    
    extendDiv = (i) =>{
        i--
        var j = 0;
        if(this.state.categories[i].brightness !== "0.5"){
            this.state.categories[i].size = "400%" 
            this.setState({
                size :  "400%"
              })
              this.state.categories.forEach(element => {
                if( i !== j ){
                    element.size ="100%"
                     this.setState({
                        size :  "100%",   
                    })  
                }
                j++;         
             });
        }   
    }
    filterBlack = (i) =>{
        i--
        var j = 0;
        if(this.state.categories[i].brightness !== "1"){
            this.state.categories[i].brightness = "1" 
            this.setState({
                brightness :  "1"
              })
              this.state.categories.forEach(element => {
                if( i !== j ){
                    element.brightness ="0"
                     this.setState({
                        brightness  :  "0",   
                    })  
                }
                j++;         
             });
        }  
    }
    useEffect = () =>{ 
            const width = window.innerWidth
            if(width > 700){
                return true
            }else{
                return false
            }
    }
    render(){  
        var AccordeonChoose = ""
        if(this.useEffect()){
            AccordeonChoose = <div className="grid-container">
                    {
                    this.state.categories.map((categorie, index)=>(  
                            <div className="grid-items"index key={categorie.id} onClick={()=>this.extendDiv(categorie.id)} style={{
                                width : this.state.categories[index].size,
                                background : this.state.categories[index].image,
                                backgroundSize : "fixed",
                                backgroundPosition : "center"
                            }}>
                                <div className="filterBlack" onClick={()=>this.filterBlack(categorie.id)} style={{
                                opacity : this.state.categories[index].brightness
                            }}>
                                    <div className="height-50">
                                        <h3 className="title-items">{this.state.categories[index].title}</h3>
                                     </div>   
                                    <div className="height-25">
                                        <div class="artiste-container">Artistes</div>
                                        <h4 className="title-artiste">{this.state.categories[index].artiste.map((e)=>(<div className="artiste">{e}</div>))}</h4>
                                     </div>   
                                    <div className="height-25 tags-box">
                                        <h4 class="budget">Budget : {this.state.categories[index].budget}&nbsp;€ </h4>
                                        <h4 className="tags-container">{this.state.categories[index].tags.map((e)=>(<div className="tags">{e}&nbsp;<i class="fa-solid fa-tag">&nbsp;</i></div>))}</h4>
                                     </div>   
                                </div>
                                        
                            </div>
                    ))}
                </div>
        }else{
            AccordeonChoose = <div className="grid-container">
                    {
                    this.state.categories.map((categorie, index)=>(  
                            <div className="grid-items"index key={categorie.id} onClick={()=>this.extendDiv(categorie.id)} style={{
                                height : this.state.categories[index].size,
                                background : this.state.categories[index].image,
                                backgroundSize : "fixed",
                                backgroundPosition : "center"
                            }}>
                                <div className="filterBlack" onClick={()=>this.filterBlack(categorie.id)} style={{
                                opacity : this.state.categories[index].brightness
                            }}>
                                    <div className="height-50">
                                        <h3 className="title-items">{this.state.categories[index].title}</h3>
                                     </div>   
                                    <div className="height-25">
                                        <div class="artiste-container">Artistes</div>
                                        <h4 className="title-artiste">{this.state.categories[index].artiste.map((e)=>(<div className="artiste">{e}</div>))}</h4>
                                     </div>   
                                    <div className="height-25 tags-box">
                                        <h4 class="budget">Budget : {this.state.categories[index].budget}&nbsp;€ </h4>
                                        <h4 className="tags-container">{this.state.categories[index].tags.map((e)=>(<div className="tags">{e}&nbsp;<i class="fa-solid fa-tag">&nbsp;</i></div>))}</h4>
                                     </div>   
                                </div>
                                        
                            </div>
                    ))}
                </div>
        }



            return (
                AccordeonChoose
            );
      
    }
       
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
    <React.StrictMode>
      <Accordeon />
    </React.StrictMode>
);

