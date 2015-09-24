# This imports all the layers for "dl_framer" into d
d = Framer.Importer.load "imported/dl_framer"
#Layers from PSD
dNav = d.Nav
dIcon1 = d.icon1
dIcon2 = d.icon2
dIcon3 = d.icon3
dIcon4 = d.icon4
dScreen1 = d.screen1
dScreen2a = d.screen2a
dScreen2a.x = 2400
dScreen2b = d.screen2b
dScreen2b.opacity = 0

#other Layers
nextButton = new Layer
	backgroundColor:""
	width:400
	height:350
	x:1550
	y:1000
backButton = new Layer
	backgroundColor:""
	width:500
	height:200
	x:150
	y:1300
moveDistance = 2240

dIcon1.states.add(
	small:{
		scale: .3
		x: 150
		y: 510
		}
)
dIcon2.states.add(
	small:{
		scale: .3
		x: 140
		y: 590
	}
)
dIcon3.states.add(
	small:{
		scale: .3
		x: 165
		y: 670
		}
)
dIcon4.states.add(
	small:{
		scale: .3
		x: 155
		y: 760
	}
)
dScreen1.states.add
	left:
		x:-moveDistance
dScreen2a.states.add
	left:
		x: dScreen2a.x - moveDistance
	
dScreen2b.states.add
	left:
		opacity:1
	right:
		x:(dScreen2b.x + moveDistance)
	invis:
		opacity:0;
		x:240	


#events
nextButton.on Events.Click, ->
	Utils.delay .05, ->
		dIcon1.states.next()
		dIcon2.states.next()
		dIcon3.states.next()
		dIcon4.states.next()
		dScreen1.states.next()
		dScreen2a.states.next()
		Utils.delay 1.2, ->
			dScreen2b.states.switch("left")

backButton.on Events.Click, ->
	dIcon1.states.next()
	dIcon2.states.next()
	dIcon3.states.next()
	dIcon4.states.next()
	dScreen1.states.next()
	dScreen2a.states.next()
	dScreen2b.states.next()
	Utils.delay 1.1, ->
		dScreen2b.states.switchInstant("invis")



