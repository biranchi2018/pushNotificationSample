//
//  APNTestAppDelegate.h
//  APNTest
//
//  Created by Biranchi on 19/11/09.
//  Copyright PurpleTalk 2009. All rights reserved.
//

#import <UIKit/UIKit.h>

@class APNTestViewController;

@interface APNTestAppDelegate : NSObject <UIApplicationDelegate> {
    UIWindow *window;
    APNTestViewController *viewController;
}

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) IBOutlet APNTestViewController *viewController;

@end

