<script setup>
import { skillStore, navigationStore } from '../../store/store.js'

</script>

<template>
	<div class="detailContainer">
		<div id="app-content">
			<!-- app-content-wrapper is optional, only use if app-content-list  -->
			<div>
				<div class="head">
					<h1 class="h1">
						{{ skillStore.skillItem.name }}
					</h1>

					<NcActions :primary="true" menu-name="Acties">
						<template #icon>
							<DotsHorizontal :size="20" />
						</template>
						<NcActionButton @click="navigationStore.setModal('editSkill')">
							<template #icon>
								<Pencil />
							</template>
							Bewerken
						</NcActionButton>
						<NcActionButton @click="navigationStore.setDialog('deleteSkill')">
							<template #icon>
								<TrashCanOutline />
							</template>
							Verwijderen
						</NcActionButton>
					</NcActions>
				</div>
				<div class="detailGrid">
					<div>
						<b>Sammenvatting:</b>
						<span>{{ skillStore.skillItem.summary }}</span>
					</div>
				</div>
				<span>{{ skillStore.skillItem.description }}</span>
			</div>
		</div>
		<div class="tabContainer">
			<BTabs content-class="mt-3" justified>
				<BTab>
					<template #title>
						Effects <NcCounterBubble>{{ skillStore.skillItem?.effects?.length || 0 }}</NcCounterBubble>
					</template>
					<div v-if="skillStore.skillItem?.effects?.length > 0">
						<NcListItem v-for="effect in skillStore.skillItem?.effects"
							:key="effect.id"
							:name="effect.name"
							:bold="false"
							:force-display-actions="true"
							:details="effect?.modification || ''"
							:counter-number="effect?.modifier">
							<template #icon>
								<MagicStaff disable-menu
									:size="44" />
							</template>
							<template #subname>
								{{ effect.name }}
							</template>
						</NcListItem>
					</div>
					<div v-else>
						Geen effects gevonden
					</div>
				</BTab>
				<BTab>
					<template #title>
						Characters <NcCounterBubble>{{ skillStore.relations ? skillStore.relations.length : 0 }}</NcCounterBubble>
					</template>
					<ObjectList :objects="skillStore.relations" />							
				</BTab>
				<BTab>
					<template #title>
						Logging <NcCounterBubble>{{ skillStore.auditTrails ? skillStore.auditTrails.length : 0 }}</NcCounterBubble>
					</template>
					<AuditList :logs="skillStore.auditTrails" />
				</BTab>
			</BTabs>
		</div>
	</div>
</template>

<script>
import { NcListItem,NcActionButton,NcActions, NcCounterBubble } from '@nextcloud/vue'
import { BTabs, BTab } from 'bootstrap-vue'

// Custom components
import AuditList from '../auditTrail/AuditList.vue'
import ObjectList from '../objects/ObjectList.vue'

// icons
import MagicStaff from 'vue-material-design-icons/MagicStaff.vue'
import BriefcaseAccountOutline from 'vue-material-design-icons/BriefcaseAccountOutline.vue'
import Pencil from 'vue-material-design-icons/Pencil.vue'
import TrashCanOutline from 'vue-material-design-icons/TrashCanOutline.vue'
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue'

export default {
	name: 'SkillDetails',
	components: {
		NcListItem,
		NcActionButton,
		NcActions,
		NcCounterBubble,
		BTabs,
		BTab,
		// Custom components
		AuditList,
		ObjectList,
		// Icons
		MagicStaff,
		BriefcaseAccountOutline,
		Pencil,
		TrashCanOutline,
		DotsHorizontal,
	},
}
</script>

<style>
h4 {
  font-weight: bold
}

.h1 {
  display: block !important;
  font-size: 2em !important;
  margin-block-start: 0.67em !important;
  margin-block-end: 0.67em !important;
  margin-inline-start: 0px !important;
  margin-inline-end: 0px !important;
  font-weight: bold !important;
  unicode-bidi: isolate !important;
}

.grid {
  display: grid;
  grid-gap: 24px;
  grid-template-columns: 1fr 1fr;
  margin-block-start: var(--zaa-margin-50);
  margin-block-end: var(--zaa-margin-50);
}

.gridContent {
  display: flex;
  gap: 25px;
}

.tabContainer>* ul>li {
  display: flex;
  flex: 1;
}

.tabContainer>* ul>li:hover {
  background-color: var(--color-background-hover);
}

.tabContainer>* ul>li>a {
  flex: 1;
  text-align: center;
}

.tabContainer>* ul>li>.active {
  background: transparent !important;
  color: var(--color-main-text) !important;
  border-bottom: var(--default-grid-baseline) solid var(--color-primary-element) !important;
}

.tabContainer>* ul {
  display: flex;
  margin: 10px 8px 0 8px;
  justify-content: space-between;
  border-bottom: 1px solid var(--color-border);
}

.tabPanel {
  padding: 20px 10px;
  min-height: 100%;
  max-height: 100%;
  height: 100%;
  overflow: auto;
}

/* Add margin to counter bubble only when inside nav-item */
.nav-item .counter-bubble__counter {
    margin-left: 10px;
}
</style>
