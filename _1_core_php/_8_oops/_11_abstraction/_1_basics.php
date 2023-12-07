<?php

// Abstraction in OOP:

//     Definition: Abstraction is the process of identifying essential features and behaviors of a real-world object and creating a simplified model (class) representing those features.
//     Purpose: To hide the complex implementation details and focus on the essential aspects relevant to the problem domain.


// Abstract Classes and Interfaces:

// Abstract Class:
//     An abstract class is a class that cannot be instantiated on its own and may contain abstract methods (methods without a body).
//     It serves as a blueprint for other classes and may include a mix of abstract and concrete methods.
//     Abstract classes may have instance variables and constructors.
//     Example:

abstract class Shape
{
    abstract public function calculateArea();
}


// Interface:

//     An interface is a contract specifying a set of methods that a class must implement.
//     All methods declared in an interface are implicitly abstract and public.
//     Classes can implement multiple interfaces but can inherit from only one class.
//     Example

interface Drawable
{
    public function draw();
}
