<template>
    <div>
        <div v-if="item_id">Карточка товара с ID={{item_id}}
            <div>Название: {{item.name}}</div>
            <div>Цена: {{item.price}}</div>
            <div>Поставщик: {{item.section.dealer.name}} ({{item.section.dealer.site}})</div>
        </div>
    </div>
</template>

<script>
    export default {
            
        props: {
            item_id : '' 
        },

        data() {
            return {
                item: ''
            }
        },
        
        watch: {
            item_id: function(val) {
                this.getItemInfo(val)
            }
        },
        
        methods: {
            
            getItemInfo(item_id) {
                
                fetch('api/get-item-info/'+item_id)
                .then(res => res.json())
                .then(res => {                    
                    this.item = res;
                })
                .catch(error => console.log(error))
                
            }
        }
    }
</script>
