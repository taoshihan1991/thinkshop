$(function(){
	// 分类树部分
	$('.nav-category-content').hover(function(){
		$(this).find('.nav-category-children').stop().fadeIn();
	},function(){
		$(this).find('.nav-category-children').stop().fadeOut();
	});
	// 导航条
	$('.nav-main-item').hover(function(){
		$(this).addClass('current').find('.nav-main-children').stop().slideDown();
	},function(){
		$(this).removeClass('current').find('.nav-main-children').stop().slideUp();
	})
})