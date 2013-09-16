//
//  APNTestAppDelegate.m
//  APNTest
//
//  Created by Biranchi on 19/11/09.
//  Copyright PurpleTalk 2009. All rights reserved.
//

//devtoken == <52d7074b c96c55ea 688141f6 28a50693 1b5ff768 95b3e993 410200fc 924e3af6>


#import "APNTestAppDelegate.h"
#import "APNTestViewController.h"

@implementation APNTestAppDelegate

@synthesize window;
@synthesize viewController;


- (BOOL)application:(UIApplication *)application didFinishLaunchingWithOptions:(NSDictionary *)launchOptions 
{
	[application registerForRemoteNotificationTypes:(UIRemoteNotificationTypeBadge | UIRemoteNotificationTypeAlert | UIRemoteNotificationTypeSound)]; 
	application.delegate=self;
	
	NSLog(@"Inside application did finish launching with options");
	
	window.rootViewController = viewController;
    [window makeKeyAndVisible];
	return YES;

}


- (void)application:(UIApplication *)app didRegisterForRemoteNotificationsWithDeviceToken:(NSData *)devToken 
{ 
	//NSData *devTokenMain = [[NSData alloc] initWithData:devToken];
	
	//devtoken == <52d7074b c96c55ea 688141f6 28a50693 1b5ff768 95b3e993 410200fc 924e3af6>

	NSLog(@"devtoken ==%@",devToken);
}

- (void)application:(UIApplication *)app didFailToRegisterForRemoteNotificationsWithError:(NSError *)err
{ 
    NSLog(@"Error in APNS : %@", err); 
} 

- (void)application:(UIApplication *)application didReceiveRemoteNotification:(NSDictionary *)userInfo
{
	NSLog(@"Notification Data : %@",userInfo);
}


//- (void)applicationDidFinishLaunching:(UIApplication *)application {    
//    
//    // Override point for customization after app launch    
//    [window addSubview:viewController.view];
//    [window makeKeyAndVisible];
//}


- (void)dealloc {
    [viewController release];
    [window release];
    [super dealloc];
}


@end
