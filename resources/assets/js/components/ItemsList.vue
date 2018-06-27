<template>
    <div>
        <div v-if="section_id">Выбрана категория с ID={{section_id}}</div>
        <ul class="list-group">
            <li v-for="item in items" v-bind:key="item.id" class="list-group-item">
                <a href="#" @click="$emit('loadItemInfo', {item_id:item.id})">{{item.name}}</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
            
        props: {
            section_id: '' 
        },

        data() {
            return {
                items: []
            }
        },
        
        watch: {
            section_id: function(val) {
                this.getItems(val)
                //console.log('section_id changed to='+val);
            }
        },
        
        methods: {
            
            getItems(section_id) {
                
                fetch('api/get-items/'+section_id)
                .then(res => res.json())
                .then(res => {                    
                    this.items= res;
                })
                .catch(error => console.log(error))
                
            }
        }
    }
</script>
