<template>
<div class="container">

    <div class="row">
        <div class="col-lg-4">
            <sections-list @loadItems="onLoadItems"></sections-list>
        </div>
        <div class="col-lg-4">
            <items-list @loadItemInfo="onLoadItemInfo" :section_id=section_id></items-list>
        </div>
        
        <div class="col-lg-4">
            <item-info :item_id=item_id></item-info>
        </div>
    </div>

</div>
</template>

<script>
import SectionsList from './SectionsList.vue'
import ItemsList from './ItemsList.vue'
import ItemInfo from './ItemInfo.vue'

export default {
        
    data() {
      return {
          section_id: '', //выбранная категория
          item_id: '' //выбранный товар
      }   
    },

    components: {
        ItemsList,
        SectionsList,
        ItemInfo
    },
    
    methods:{
        onLoadItems (data) {
            this.section_id = data.section_id;
            this.item_id = null;
            //console.log('SectionList component said loadItems ', data);
        },
        
        onLoadItemInfo (data) {
            this.item_id = data.item_id;
            //console.log('ItemsList component said onLoadItemInfo ', data);
        }
    }
}
</script>

<style>

</style>