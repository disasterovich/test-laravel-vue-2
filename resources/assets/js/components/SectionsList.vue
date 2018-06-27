<template>
    <div>
        <ul class="list-group">
            <li v-for="section in sections" v-bind:key="section.id" class="list-group-item">
                <a href="#" @click="$emit('loadItems', {section_id:section.id})">{{section.name}}</a>
                <ul class="list-group" v-if="section.children">
                    <li v-for="child in section.children" v-bind:key="child.id" class="list-group-item">
                        <a href="#" @click="$emit('loadItems', {section_id:child.id})">{{child.name}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              sections: [],
              items: []
          }  
        },
        mounted() {
            console.log('Component SectionsList mounted.');
            this.getSections();
        },
        methods: {
            getSections() {
                
                fetch('api/get-sections')
                .then(res => res.json())
                .then(res => {
                    this.sections= res;
                })
                .catch(error => console.log(error))
                
            },

        }
    }
</script>
