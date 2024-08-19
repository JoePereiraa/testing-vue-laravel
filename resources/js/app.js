import './bootstrap';

import { createApp } from "vue";

import Card from "./components/Drag/Card.vue";
import Column from './components/Drag/Column.vue';
import Draggable from './components/Drag/Draggable.vue';

const app = createApp();

app.component('Card', Card);
app.component('Column', Column);
app.component('Draggable', Draggable);

app.mount('#app')