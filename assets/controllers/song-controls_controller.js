import { Controller } from '@hotwired/stimulus';
import axios from 'axios';


/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    /* TO DO SOMETHING EACH TIME WE SEE A SONG RAW : 
    connect() {
        this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }*/

    static values = {       // To get the value from the twig (from the url)
        infoUrl: String     // To get the url
    }

    play(event) {
        event.preventDefault();             // to prevent follow the link click

        // console.log(this.infoUrlValue);     // this.infoUrlValue : To refer the value
        axios.get(this.infoUrlValue)
            .then((response) => {
                // console.log(response);
                const audio = new Audio(response.data.url);
                audio.play();
            });
    }
}
