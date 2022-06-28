import React from "react";
import ReactDOM from "react-dom/client";



class Accordeon extends React.Component{
    state = {
       categories: [
            {id: 1, 
                title: "test" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "build/uploads/bg_01.jpg"
            },
            {id: 2, 
                title: "test2" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "build/uploads/Marie.jpg"
            },
            {id: 3, 
                title: "test2" , 
                tags: ["tag1" , "tag2", "tag3"],
                artiste: ["Artiste1","Artiste2","Artiste3"],
                budget: 5000,
                image: "build/uploads/bg_01.jpg"
            }
       ]
    }
    handleClick(){
        alert("Click !");
    }
    render(){  
        return (
            <div className="grid-container" onClick={this.handleClick}>
                {this.state.categories.map(function(categorie){
                    return (
                        <div className="grid-items" key={categorie.id}>
                            <img src={categorie.image} alt="" className="img-responsive" />            
                        </div>
                     )
                })}   
            </div>
        );
    }
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
    <React.StrictMode>
      <Accordeon />
    </React.StrictMode>
);

