/*
 Highcharts JS v10.3.2 (2022-11-28)

 (c) 2009-2021 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/modules/series-label",["highcharts"],function(t){a(t);a.Highcharts=t;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function t(a,q,A,c){a.hasOwnProperty(q)||(a[q]=c.apply(null,A),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:q,module:a[q]}})))}a=a?a._modules:{};
t(a,"Extensions/SeriesLabel/SeriesLabelDefaults.js",[],function(){return{enabled:!0,connectorAllowed:!1,connectorNeighbourDistance:24,format:void 0,formatter:void 0,minFontSize:null,maxFontSize:null,onArea:null,style:{fontWeight:"bold"},useHTML:!1,boxesToAvoid:[]}});t(a,"Extensions/SeriesLabel/SeriesLabelUtilities.js",[],function(){function a(a,c,q,x,h,u){a=(u-c)*(q-a)-(x-c)*(h-a);return 0<a?!0:!(0>a)}function q(A,c,q,x,h,u,y,z){return a(A,c,h,u,y,z)!==a(q,x,h,u,y,z)&&a(A,c,q,x,h,u)!==a(A,c,q,x,y,
z)}return{boxIntersectLine:function(a,c,t,x,h,u,y,z){return q(a,c,a+t,c,h,u,y,z)||q(a+t,c,a+t,c+x,h,u,y,z)||q(a,c+x,a+t,c+x,h,u,y,z)||q(a,c,a,c+x,h,u,y,z)},intersectRect:function(a,c){return!(c.left>a.right||c.right<a.left||c.top>a.bottom||c.bottom<a.top)}}});t(a,"Extensions/SeriesLabel/SeriesLabel.js",[a["Core/Animation/AnimationUtilities.js"],a["Core/Chart/Chart.js"],a["Core/FormatUtilities.js"],a["Core/Defaults.js"],a["Extensions/SeriesLabel/SeriesLabelDefaults.js"],a["Extensions/SeriesLabel/SeriesLabelUtilities.js"],
a["Core/Utilities.js"]],function(a,q,t,c,M,x,h){function u(e,a,b,l,d){var f=e.chart,B=e.options.label||{},k=C(B.onArea,!!e.area),H=k||B.connectorAllowed,g=f.boxesToAvoid,c=Number.MAX_VALUE,q=Number.MAX_VALUE,r,h,n;for(n=0;g&&n<g.length;n+=1)if(N(g[n],{left:a,right:a+l.width,top:b,bottom:b+l.height}))return!1;for(n=0;n<f.series.length;n+=1){var v=f.series[n];g=v.interpolatedPoints&&O([],v.interpolatedPoints,!0);if(v.visible&&g){var m=f.plotHeight/10;for(h=f.plotTop;h<=f.plotTop+f.plotHeight;h+=m)g.unshift({chartX:f.plotLeft,
chartY:h}),g.push({chartX:f.plotLeft+f.plotWidth,chartY:h});for(m=1;m<g.length;m+=1){if(g[m].chartX>=a-16&&g[m-1].chartX<=a+l.width+16){if(I(a,b,l.width,l.height,g[m-1].chartX,g[m-1].chartY,g[m].chartX,g[m].chartY))return!1;e===v&&!r&&d&&(r=I(a-16,b-16,l.width+32,l.height+32,g[m-1].chartX,g[m-1].chartY,g[m].chartX,g[m].chartY))}if((H||r)&&(e!==v||k)){h=a+l.width/2-g[m].chartX;var u=b+l.height/2-g[m].chartY;c=Math.min(c,h*h+u*u)}}if(!k&&H&&e===v&&(d&&!r||c<Math.pow(B.connectorNeighbourDistance||1,
2))){for(m=1;m<g.length;m+=1)if(r=Math.min(Math.pow(a+l.width/2-g[m].chartX,2)+Math.pow(b+l.height/2-g[m].chartY,2),Math.pow(a-g[m].chartX,2)+Math.pow(b-g[m].chartY,2),Math.pow(a+l.width-g[m].chartX,2)+Math.pow(b-g[m].chartY,2),Math.pow(a+l.width-g[m].chartX,2)+Math.pow(b+l.height-g[m].chartY,2),Math.pow(a-g[m].chartX,2)+Math.pow(b+l.height-g[m].chartY,2)),r<q){q=r;var p=g[m]}r=!0}}}return!d||r?{x:a,y:b,weight:c-(p?q:0),connectorPoint:p}:!1}function y(a){var B=a.labelSeries||[];a.boxesToAvoid=[];
B.forEach(function(b){var l=b.options.label||{},d=a.boxesToAvoid;b.interpolatedPoints=z(b);d&&d.push.apply(d,l.boxesToAvoid||[])});a.series.forEach(function(b){function l(b,a,e){var d=Math.max(c,C(x,-Infinity)),f=Math.min(c+r,C(y,Infinity));return b>d&&b<=f-e.width&&a>=h&&a<=h+q-e.height}var d=b.options.label;if(d&&(b.xAxis||b.yAxis)){var f="highcharts-color-"+C(b.colorIndex,"none"),B=!b.labelBySeries,k=d.minFontSize,e=d.maxFontSize,g=a.inverted,c=g?b.yAxis.pos:b.xAxis.pos,h=g?b.xAxis.pos:b.yAxis.pos,
r=a.inverted?b.yAxis.len:b.xAxis.len,q=a.inverted?b.xAxis.len:b.yAxis.len,n=b.interpolatedPoints,v=C(d.onArea,!!b.area),m=[],t=b.xData||[],p,w=b.labelBySeries;if(v&&!g){g=[b.xAxis.toPixels(t[0]),b.xAxis.toPixels(t[t.length-1])];var x=Math.min.apply(Math,g);var y=Math.max.apply(Math,g)}if(b.visible&&!b.boosted&&n){w||(w=b.name,"string"===typeof d.format?w=P(d.format,b,a):d.formatter&&(w=d.formatter.call(b)),b.labelBySeries=w=a.renderer.label(w,0,0,"connector",0,0,d.useHTML).addClass("highcharts-series-label highcharts-series-label-"+
b.index+" "+(b.options.className||"")+" "+f),a.renderer.styledMode||(f="string"===typeof b.color?b.color:"#666666",w.css(J({color:v?a.renderer.getContrast(f):f},d.style||{})),w.attr({opacity:a.renderer.forExport?1:0,stroke:b.color,"stroke-width":1})),k&&e&&w.css({fontSize:k+(b.sum||0)/(b.chart.labelSeriesMaxSum||0)*(e-k)+"px"}),w.attr({padding:0,zIndex:3}).add());k=w.getBBox();k.width=Math.round(k.width);for(g=n.length-1;0<g;--g)v?(e=n[g].chartX-k.width/2,f=(n[g].chartCenterY||0)-k.height/2,l(e,f,
k)&&(p=u(b,e,f,k))):(e=n[g].chartX+3,f=n[g].chartY-k.height-3,l(e,f,k)&&(p=u(b,e,f,k,!0)),p&&m.push(p),e=n[g].chartX+3,f=n[g].chartY+3,l(e,f,k)&&(p=u(b,e,f,k,!0)),p&&m.push(p),e=n[g].chartX-k.width-3,f=n[g].chartY+3,l(e,f,k)&&(p=u(b,e,f,k,!0)),p&&m.push(p),e=n[g].chartX-k.width-3,f=n[g].chartY-k.height-3,l(e,f,k)&&(p=u(b,e,f,k,!0))),p&&m.push(p);if(d.connectorAllowed&&!m.length&&!v)for(e=c+r-k.width;e>=c;e-=16)for(f=h;f<h+q-k.height;f+=16)(p=u(b,e,f,k,!0))&&m.push(p);if(m.length){if(m.sort(function(b,
a){return a.weight-b.weight}),p=m[0],(a.boxesToAvoid||[]).push({left:p.x,right:p.x+k.width,top:p.y,bottom:p.y+k.height}),(n=Math.sqrt(Math.pow(Math.abs(p.x-(w.x||0)),2)+Math.pow(Math.abs(p.y-(w.y||0)),2)))&&b.labelBySeries&&(m={opacity:a.renderer.forExport?1:0,x:p.x,y:p.y},d={opacity:1},10>=n&&(d={x:m.x,y:m.y},m={}),n=void 0,B&&(n=F(b.options.animation),n.duration*=.2),b.labelBySeries.attr(J(m,{anchorX:p.connectorPoint&&(p.connectorPoint.plotX||0)+c,anchorY:p.connectorPoint&&(p.connectorPoint.plotY||
0)+h})).animate(d,n),b.options.kdNow=!0,b.buildKDTree(),b=b.searchPoint({chartX:p.x,chartY:p.y},!0)))w.closest=[b,p.x-(b.plotX||0),p.y-(b.plotY||0)]}else w&&(b.labelBySeries=w.destroy())}else w&&(b.labelBySeries=w.destroy())}});Q(a,"afterDrawSeriesLabels")}function z(a){function e(a){var b=Math.round((a.plotX||0)/8)+","+Math.round((a.plotY||0)/8);u[b]||(u[b]=1,l.push(a))}if(a.xAxis||a.yAxis){var b=a.points,l=[],d=a.graph||a.area,f=d&&d.element,c=a.chart.inverted,k=a.xAxis,h=a.yAxis,g=c?h.pos:k.pos;
c=c?k.pos:h.pos;k=C((a.options.label||{}).onArea,!!a.area);var q=h.getThreshold(a.options.threshold),u={};if(a.getPointSpline&&f&&f.getPointAtLength&&!k&&b.length<(a.chart.plotSizeX||0)/16){k=d.toD&&d.attr("d");d.toD&&d.attr({d:d.toD});h=f.getTotalLength();for(a=0;a<h;a+=16)q=f.getPointAtLength(a),e({chartX:g+q.x,chartY:c+q.y,plotX:q.x,plotY:q.y});k&&d.attr({d:k});var r=b[b.length-1];e({chartX:g+(r.plotX||0),chartY:c+(r.plotY||0)})}else for(h=b.length,d=void 0,a=0;a<h;a+=1){r=b[a];f=r.plotX;var t=
r.plotY;if(E(f)&&E(t)){var n={plotX:f,plotY:t,chartX:g+f,chartY:c+t};k&&(n.chartCenterY=c+(t+C(r.yBottom,q))/2);if(d){r=Math.abs(n.chartX-d.chartX);var v=Math.abs(n.chartY-d.chartY);r=Math.max(r,v);if(16<r)for(r=Math.ceil(r/16),v=1;v<r;v+=1)e({chartX:d.chartX+v/r*(n.chartX-d.chartX),chartY:d.chartY+v/r*(n.chartY-d.chartY),chartCenterY:(d.chartCenterY||0)+v/r*((n.chartCenterY||0)-(d.chartCenterY||0)),plotX:(d.plotX||0)+v/r*(f-(d.plotX||0)),plotY:(d.plotY||0)+v/r*(t-(d.plotY||0))})}e(n);d=n}}return l}}
function A(a){if(this.renderer){var e=this,b=F(e.renderer.globalAnimation).duration;e.labelSeries=[];e.labelSeriesMaxSum=0;e.seriesLabelTimer&&h.clearTimeout(e.seriesLabelTimer);e.series.forEach(function(l){var d=l.options.label||{},f=l.labelBySeries,c=f&&f.closest;d.enabled&&l.visible&&(l.graph||l.area)&&!l.boosted&&e.labelSeries&&(e.labelSeries.push(l),d.minFontSize&&d.maxFontSize&&l.yData&&(l.sum=l.yData.reduce(function(a,b){return(a||0)+(b||0)},0),e.labelSeriesMaxSum=Math.max(e.labelSeriesMaxSum||
0,l.sum||0)),"load"===a.type&&(b=Math.max(b,F(l.options.animation).duration)),c&&("undefined"!==typeof c[0].plotX?f.animate({x:c[0].plotX+c[1],y:c[0].plotY+c[2]}):f.attr({opacity:0})))});e.seriesLabelTimer=R(function(){e.series&&e.labelSeries&&y(e)},e.renderer.forExport||!b?0:b)}}function L(a,c,b,l,d){var f=d&&d.anchorX;d=d&&d.anchorY;var e=b/2;if(E(f)&&E(d)){var k=[["M",f,d]];var h=c-d;0>h&&(h=-l-h);h<b&&(e=f<a+b/2?h:b-h);d>c+l?k.push(["L",a+e,c+l]):d<c?k.push(["L",a+e,c]):f<a?k.push(["L",a,c+l/
2]):f>a+b&&k.push(["L",a+b,c+l/2])}return k||[]}var O=this&&this.__spreadArray||function(a,c,b){if(b||2===arguments.length)for(var e=0,d=c.length,f;e<d;e++)!f&&e in c||(f||(f=Array.prototype.slice.call(c,0,e)),f[e]=c[e]);return a.concat(f||Array.prototype.slice.call(c))},F=a.animObject,P=t.format,G=c.setOptions,I=x.boxIntersectLine,N=x.intersectRect,K=h.addEvent,J=h.extend,Q=h.fireEvent,E=h.isNumber,C=h.pick,R=h.syncTimeout,D=[];"";return{compose:function(a,c){-1===D.indexOf(a)&&(D.push(a),K(q,"load",
A),K(q,"redraw",A));-1===D.indexOf(c)&&(D.push(c),c.prototype.symbols.connector=L);-1===D.indexOf(G)&&(D.push(G),G({plotOptions:{series:{label:M}}}))}}});t(a,"masters/modules/series-label.src.js",[a["Core/Globals.js"],a["Extensions/SeriesLabel/SeriesLabel.js"]],function(a,q){q.compose(a.Chart,a.SVGRenderer)})});
//# sourceMappingURL=series-label.js.map